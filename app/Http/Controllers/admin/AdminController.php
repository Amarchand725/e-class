<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Auth;
use App\Models\Order;
use App\Models\EnrollStudent;

class AdminController extends Controller
{
    public function orders(Request $request)
    {
        if($request->ajax()){
            $query = EnrollStudent::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("order_number", "like", "%". $request["search"] ."%");
                $query->orWhere("user_slug", "like", "%". $request["search"] ."%");
                $query->orWhere("product_type", "like", "%". $request["search"] ."%");
                $query->orWhere("product_slug", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('admin.orders._search', compact('models'));
        }

        $page_title  = 'All Orders';
        $models = EnrollStudent::orderby('id', 'desc')->paginate(10);
        return view('admin.orders.index', compact('models', 'page_title'));
    }
}
