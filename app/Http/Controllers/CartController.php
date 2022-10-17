<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Bundle;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Auth;
use Session;
use Stripe;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.cart');
    }
    public function addToCart($slug)
    {
        $model = Course::where('slug', $slug)->first();
        $product_type = 'course';
        if(empty($model)){
            $model = Bundle::where('slug', $slug)->first();
            $product_type = 'bundle';
        }
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$slug])) {
            $cart[$slug]['quantity']++;
        } else {
            $cart[$slug] = [
                "product_type" => $product_type,
                "name" => $model->title,
                "slug" => $model->slug,
                "quantity" => 1,
                "price" => $model->price,
                "retail_price" => $model->retail_price,
                "image" => $model->thumbnail
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Course added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed successfully');
        }
    }

    public function checkout()
    {
        if(Session::has('checkout')){
            return Session::get('checkout');
        }
        if(Auth::check()){
            return view('cart.checkout');
        }else{
            Session::put('checkout', 'checkout');
            return redirect()->route('login');
        }
    }

    public function completeOrder(Request $request)
    {
        $total = 0;
        $original_total = 0;
        $total_items = 0;
        if(session('cart')){
            $total_items = count(session('cart'));
            foreach(session('cart') as $id => $details){
                $sub_total = 0; 
                $sub_total += $details['price'] * $details['quantity'];

                if(!empty($details['retail_price'])){
                    $total += $sub_total;
                    $original_total += $details['retail_price'] * $details['quantity'];
                }else{
                    $total += $sub_total;
                    $original_total += $sub_total;
                }
            }
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment = Stripe\Charge::create ([
            "amount" => 100 * $total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order payment" 
        ]);

        do{
            $order_number = random_int(100000, 999999);
        }while(Order::where('order_number', $order_number)->first());

        $discount = 0;
        $discount = $original_total-$total;
        if($discount > 0){
            $discount = $discount;
        }
        if($payment->status=='succeeded'){
            $order = Order::create([
                'user_slug' => Auth::user()->slug,
                'order_number' => $order_number,
                'total' => $original_total,
                'discount' => $discount,
                'total_items' => $total_items,
                'grand_total' => $total,
                'payment_type' => 'stripe',
                'payment_status' => $payment->status,
            ]);

            if($order){
                if(session('cart')){
                    $total_items = count(session('cart'));
                    foreach(session('cart') as $id => $details){
                        $item_discount = 0;
                        $sub_total = 0;
                        $sub_total = $details['price'] * $details['quantity'];
                        $price = $details['price'];
                        if(!empty($details['retail_price'])){
                            $price = $details['retail_price'];
                            $item_discount = $details['retail_price']-$details['price'];   
                        }
                        OrderDetails::create([
                            'order_number' => $order->order_number,
                            'product_slug' => $details['slug'],
                            'price' => $price,
                            'discount' => $item_discount,
                            'discount_type' => 'default',
                            'quantity' => $details['quantity'],
                            'subtotal' => $sub_total,
                        ]);
                    }

                    Payment::create([
                        'order_number' => $order->order_number,
                        'payment_method' => 'stripe',
                        'total' => $original_total,
                        'discount' => $discount,
                        'grand_total' => $total,
                        'paid' => $total,
                        'dues' => $total-$total,
                        'status' => $payment->status,
                        'trasaction_id' => $payment->source->id,
                        'brand' => $payment->source->brand,
                        'name_on_card' => $request->nameOnCard,
                        'card_last_four_digit' => $payment->source->last4,
                        'expire_month' => $payment->source->exp_month,
                        'expire_year' => $payment->source->exp_year,    
                    ]);
                }
            }

            session()->forget('cart');
        }
  
        Session::flash('success', 'Payment successful!');
          
        return redirect()->route('home');
    }
}
