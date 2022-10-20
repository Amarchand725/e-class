<?php

namespace App\Http\Controllers;

use App\Models\EnrollStudent;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Institute;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\Course;
use DB;
use Session;
use Auth;
use Illuminate\Support\Str;

class EnrollStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
            return (string) view('enroll-student._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'enrollstudent')->first()->label;
        $models = EnrollStudent::orderby('id', 'desc')->paginate(10);
        return view('enroll-student.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'enrollstudent')->first()->label;
        $order_users = DB::table('orders')
            ->select('orders.user_slug')
            ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
            ->join('courses', 'courses.slug', '=', 'order_details.product_slug')
            ->join('users', 'users.slug', '=', 'courses.instructor_slug')
            ->where('users.slug', Auth::user()->slug)
            ->get();
        
        $students = [];
        foreach($order_users as $order_user){
            $students[] = $order_user->user_slug;
        }
        // return $students;
        $users = User::whereIn('slug', $students)->get(['slug', 'name']);
        return view('enroll-student.create', compact('view_all_title', 'users'));
    }

    public function getUserCourses(Request $reqeuest)
    {
        $order_courses = DB::table('orders')
        ->select('courses.slug', 'courses.title', 'orders.order_number')
        ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
        ->join('courses', 'courses.slug', '=', 'order_details.product_slug')
        // ->join('enrollstudents', 'enrollstudents.product_slug', '=', 'order_details.product_slug')
        ->where('orders.user_slug', $reqeuest->user_slug)
        ->where('courses.instructor_slug', Auth::user()->slug)
        // ->where('enrollstudents.user_slug', $reqeuest->user_slug)
        ->get();

        $order_bundles = DB::table('orders')
        ->select('bundles.slug', 'bundles.title', 'orders.order_number')
        ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
        ->join('bundles', 'bundles.slug', '=', 'order_details.product_slug')
        ->where('orders.user_slug', $reqeuest->user_slug)
        ->where('bundles.user_slug', Auth::user()->slug)
        ->get();

        return response()->json(['order_courses' => $order_courses, 'order_bundles' => $order_bundles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_slug' => 'required',
            'products' => 'required',
            'products.*' => 'required',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try{
            $model = new EnrollStudent();
            foreach($request->products as $product){
                $pro_slug = explode(',', $product);
                $instructor_slug = '';
                if($pro_slug[0]=='course'){
                    $instructor_slug = Course::where('slug', $pro_slug[2])->first()->instructor_slug;
                }else{
                    $instructor_slug = Bundle::where('slug', $pro_slug[2])->first()->user_slug;
                }
                
                $model->created_by = Auth::user()->id;
                $model->user_slug = $request->user_slug;
                $model->instructor_slug = $instructor_slug;
                $model->product_type = $pro_slug[0]; //product type e.g course or bundle
                $model->order_number = $pro_slug[1]; //product order number
                $model->product_slug = $pro_slug[2]; //product slug
                $model->save();
            }

            DB::commit();
            return redirect()->route('enrollstudent.index')->with('message', 'User enrolled successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollStudent  $enrollStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_all_title = Menu::where('menu', 'enrollstudent')->first()->label;
        $model = EnrollStudent::findOrFail($id);
      	return view('enroll-student.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnrollStudent  $enrollStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = EnrollStudent::findOrFail($id);
        $view_all_title = Menu::where('menu', 'enrollstudent')->first()->label;
        $order_users = DB::table('orders')
            ->select('orders.user_slug')
            ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
            ->join('courses', 'courses.slug', '=', 'order_details.product_slug')
            ->join('users', 'users.slug', '=', 'courses.instructor_slug')
            ->where('users.slug', Auth::user()->slug)
            ->get();
        
        $students = [];
        foreach($order_users as $order_user){
            $students[] = $order_user->user_slug;
        }

        $order_courses = DB::table('orders')
        ->select('courses.slug', 'courses.title', 'orders.order_number')
        ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
        ->join('courses', 'courses.slug', '=', 'order_details.product_slug')
        // ->join('enrollstudents', 'enrollstudents.product_slug', '!=', 'order_details.product_slug')
        ->where('orders.user_slug', $model->user_slug)
        ->where('courses.instructor_slug', Auth::user()->slug)
        // ->where('enrollstudents.user_slug', $model->user_slug)
        ->get();

        $order_bundles = DB::table('orders')
        ->select('bundles.slug', 'bundles.title', 'orders.order_number')
        ->join('order_details', 'order_details.order_number', '=', 'orders.order_number')
        ->join('bundles', 'bundles.slug', '=', 'order_details.product_slug')
        ->where('orders.user_slug', $model->user_slug)
        ->where('bundles.user_slug', Auth::user()->slug)
        ->get();

        $users = User::whereIn('slug', $students)->get(['slug', 'name']);
        return view('enroll-student.edit', compact('view_all_title', 'users', 'model', 'order_courses', 'order_bundles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnrollStudent  $enrollStudent
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $rules = [
            'user_slug' => 'required',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try{
            $model = EnrollStudent::findOrFail($id);

            foreach($request->products as $product){
                if(!empty($product)){
                    $pro_slug = explode(',', $product);
                    $instructor_slug = '';
                    if($pro_slug[0]=='course'){
                        $instructor_slug = Course::where('slug', $pro_slug[2])->first()->instructor_slug;
                    }else{
                        $instructor_slug = Bundle::where('slug', $pro_slug[2])->first()->user_slug;
                    }
                    $model->created_by = Auth::user()->id;
                    $model->user_slug = $request->user_slug;
                    $model->instructor_slug = $instructor_slug;
                    $model->product_type = $pro_slug[0]; //product type e.g course or bundle
                    $model->order_number = $pro_slug[1]; //product order number
                    $model->product_slug = $pro_slug[2]; //product slug
                    $model->save();
                }
            }

            DB::commit();
            return redirect()->route('enrollstudent.index')->with('message', 'User enrolled updated successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnrollStudent  $enrollStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = EnrollStudent::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
