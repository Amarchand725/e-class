<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\User;
use App\Models\Bundle;
use App\Models\UserProfile;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Wishlist;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\EmailSubscription;
use App\Models\Category;
use App\Models\EnrollStudent;
use App\Models\ProductRate;
use App\Models\Meeting;
use App\Models\CourseClass;
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
    public function allDiscountCourses()
    {
        $models = Course::where('status', 1)->where('discount', '!=', NULL)->get();
        return view('web-views.website.course.discount', compact('models'));
    }
    public function allFeatureCourses()
    {
        $models = Course::orderby('id', 'desc')->where('status', 1)->where('is_featured', 1)->get();
        return view('web-views.website.course.featured', compact('models'));
    }
    public function courseSingle($slug)
    {
        $model = Course::where('slug', $slug)->first();
        $recent_courses = Course::orderby('updated_at', 'desc')->where('id', '!=', $model->id)->where('status', 1)->take(4)->get();
        $related_courses = Course::where('id', '!=', $model->id)->where('status', 1)->where('category_slug', $model->category_slug)->get();
        return view('web-views.website.course.single', compact('model', 'recent_courses', 'related_courses'));
    }
    public function meetingSingle($slug)
    {
        $model = Meeting::where('slug', $slug)->first();
        return view('web-views.website.meeting.single', compact('model'));
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
    public function userEditProfile()
    {
        $countries = Country::get();
        $states = State::where('country_id', Auth::user()->hasUserProfile->country_id)->get();
        $cities = City::where('state_id', Auth::user()->hasUserProfile->state_id)->get();
        return view('web-views.website.user.edit-profile', compact('countries', 'states', 'cities'));
    }
    public function emailSubscribe(Request $request)
    {
        $rules = [
            'subscribed_email' => 'required',
        ];

        $this->validate($request, $rules);

        $model = EmailSubscription::where('email', $request->subscribed_email)->first();
        if(empty($model)){
            $success = EmailSubscription::create([
                'email' => $request->subscribed_email,
            ]);

            if($success){
                return 'success';
            }else{
                return 'failed';
            }
        }else{
            return 'exist';
        }
    }

    public function categoryWiseCourses($slug)
    {
        $models = Course::where('category_slug', $slug)->get();
        $category = Category::where('slug', $slug)->first();
        return view('web-views.website.category.category-wise-list', compact('models', 'category'));
    }

    public function userCompleteCourse(Request $request)
    {
        $model = EnrollStudent::where('product_slug', $request->product_slug)->where('user_slug', Auth::user()->slug)->first();
        $model->is_completed = 1;
        $model->save();

        if($model){
            return 'success';
        }else{
            return 'failed';
        }
    }

    public function userRate(Request $request)
    {
        $model = ProductRate::where('user_slug', Auth::user()->slug)->where('product_slug', $request->product_slug)->first();
        if($model){
            $model->rate = $request->rating_value;
            $model->review = $request->review;
            $model->save();
        }else{
            $model = ProductRate::create([
                'user_slug' => Auth::user()->slug,
                'product_slug' => $request->product_slug,
                'rate' => $request->rating_value,
                'review' => $request->review,
            ]);
        }
        if($model){
            return 'success';
        }else{
            return 'failed';
        }
    }
    public function getChapters(Request $request)
    {
        $course = Course::where('slug', $request->course_slug)->first();
        return CourseChapter::where('course_id', $course->id)->get();
    }
    public function getClasses(Request $request)
    {
        return CourseClass::where('chapter_id', $request->chapter_id)->get();
    }
}
