<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Course;
use App\Models\User;
use App\Models\Bundle;
use App\Models\UserProfile;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Wishlist;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Role as UserRole;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function index()
    {
        return view('web-views.website.index');
    }

    public function instituteSingle($slug)
    {
        $model = Institute::where('slug', $slug)->first();
        return view('web-views.website.institutes.single', compact('model'));
    }

    public function courseSingle($slug)
    {
        $model = Course::where('slug', $slug)->first();
        $recent_courses = Course::orderby('updated_at', 'desc')->where('id', '!=', $model->id)->where('status', 1)->take(4)->get();
        $related_courses = Course::where('id', '!=', $model->id)->where('status', 1)->where('category_slug', $model->category_slug)->get();
        return view('web-views.website.course.single', compact('model', 'recent_courses', 'related_courses'));
    }
    public function userProfile($slug)
    {
        $model = User::where('slug', $slug)->first();
        $courses = Course::where('created_by', $model->id)->paginate(4);
        return view('web-views.website.user.profile', compact('model', 'courses'));
    }

    public function bundleSingle($slug)
    {
        $model = Bundle::where('slug', $slug)->first();
        $courses = Course::whereIn('id', json_decode($model->course_ids))->get(['title', 'slug', 'short_description']);
        return view('web-views.website.bundle.single', compact('model', 'courses'));
    }

    public function userStore(Request $request)
    {
        if(!isset($request->password)){
            $request['password'] = 'password';
            $request['confirmed'] = 'password';
            $request['role_id'] = 'Instructor';
        }

        $this->validate($request, User::getValidationRules());
        $this->validate($request, UserProfile::getValidationRules());

        DB::beginTransaction();

        try{
            $name = $request->first_name.' '.$request->last_name;

            $slug = '';
            do{
                $slug = Str::random(2);
                $slug = Str::slug($name).'-'.strtolower($slug);
            }while(User::where('slug', $slug)->first());

            $user = User::create([
                'name' => $name,
                'slug' => $slug,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->role_id);

            if($user){
                $input = $request->except(['_token', 'role_id', 'email', 'password', 'confirmed', 'term']);
                if (isset($request->profile_image)) {
                    $profile_image = date('d-m-Y-His').'.'.$request->file('profile_image')->getClientOriginalExtension();
                    $request->profile_image->move(public_path('/admin/images/profiles'), $profile_image);
                    $input['profile_image'] = $profile_image;
                }

                if (isset($request->resume)) {
                    $resume = date('d-m-Y-His').'.'.$request->file('resume')->getClientOriginalExtension();
                    $request->resume->move(public_path('/admin/user/resumes'), $resume);
                    $input['resume'] = $resume;
                }

                $input['user_id'] = $user->id;

                UserProfile::create($input);
            }

            DB::commit();
            if($user){
                return response()->json(['code'=>200]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code'=>500, 'Error'=> $e->getMessage()]);
        }
    }
    public function myCourses()
    {
        $orders = Order::with('haveOrderDetails')->orderby('id', 'desc')->where('user_slug', Auth::user()->slug)->get();
        return view('web-views.website.user.my-courses', compact('orders'));
    }
    public function myCourseDetails($slug)
    {
        $model = OrderDetails::where('product_slug', $slug)->first();
        return view('web-views.website.user.my-course-details', compact('model'));
    }
    public function wishListStore(Request $request)
    {
        $model = Wishlist::where('user_slug', Auth::user()->slug)->where('product_slug', $request->slug)->first();
        if(empty($model)){
            $inserted = Wishlist::create([
                'user_slug' => Auth::user()->slug,
                'product_slug' => $request->slug,
            ]);

            if($inserted){
                return 'success';
            }else{
                return 'failed';
            }
        }else{
            return 'exist';
        }
    }
    public function wishList()
    {
        $wishes = Wishlist::orderby('id', 'desc')->where('user_slug', Auth::user()->slug)->get();
        return view('web-views.website.user.wishlist', compact('wishes'));
    }
    public function wishListDestroy(Request $request)
    {
        $model = Wishlist::where('user_slug', Auth::user()->slug)->where('product_slug', $request->slug)->delete();
        if($model){
            return 'success';
        }else{
            return 'failed';
        }
    }
    public function purchaseHistory()
    {
        $orders = Order::where('user_slug', Auth::user()->slug)->get();
        return view('web-views.website.user.purchase-history', compact('orders'));
    }
    public function orderInvoice($order_number)
    {
        $order = Order::where('order_number', $order_number)->first();
        return view('web-views.website.user.order-invoice', compact('order'));
    }
    public function editProfile()
    {
        return 'good';
    }
}
