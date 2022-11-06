<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::get('/', 'WebController@index')->name('home');
Route::get('/institute/{slug}/single', 'WebController@instituteSingle')->name('institute.single');
Route::get('/course/{slug}/single', 'WebController@courseSingle')->name('course.single');
Route::get('/meeting/{slug}/single', 'WebController@meetingSingle')->name('meeting.single');
Route::get('/course/all-discount/courses', 'WebController@allDiscountCourses')->name('course.all-discount.courses');
Route::get('/course/all-feature/courses', 'WebController@allFeatureCourses')->name('course.all-feature.courses');
Route::get('/bundle/{slug}/single', 'WebController@bundleSingle')->name('bundle.single');
Route::get('/user/{slug}/profile', 'WebController@userProfile')->name('user.profile');
Route::get('/following', 'FollowerController@following')->name('following');
Route::get('get-chapters', 'WebController@getChapters')->name('get-chapters');
Route::get('get-classes', 'WebController@getClasses')->name('get-classes');
Route::get('chapter/chat/{chapter_id}', 'ChatController@Chat')->name('chapter.chat');
Route::post('/user/store', 'WebController@userStore')->name('user.store');
//cart
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'CartController@update')->name('update.cart');
Route::delete('remove-from-cart', 'CartController@remove')->name('remove.from.cart');
Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('complete-order', 'CartController@completeOrder')->name('complete-orrder');

Route::group(['middleware' => 'guest'], function(){
    //login/signup
    Route::get('/admin/login','DashboardController@login')->name('admin.login');
    Route::post('/admin/login', 'DashboardController@authenticate')->name('admin.login');

    //logout
    Route::post('/logout', 'DashboardController@logout')->name('logout');
    Route::post('user/email_subscribe', 'WebController@emailSubscribe')->name('user.email_subscribe');
    Route::get('user/{slug}/category-wise-course', 'WebController@categoryWiseCourses')->name('user.category-wise-course');

    //get states/cities
    Route::get('get_states', 'admin\StateController@getStates')->name('get_states');
    Route::get('get_cities', 'admin\CityController@getCities')->name('get_cities');
});

Route::middleware(['auth','role:Student'])->group(function () {
    Route::get('/user/my_courses', 'WebController@myCourses')->name('user.my_courses');
    Route::get('/user/my_course/{slug}/single', 'WebController@myCourseDetails')->name('user.my_course.single');
    Route::post('/user/wishlist/store', 'WebController@wishListStore')->name('user.wishlist.store');
    Route::get('/user/wishlist', 'WebController@wishList')->name('user.wishlist');
    Route::post('/user/wishlist/destroy', 'WebController@wishListDestroy')->name('user.wishlist.destroy');
    Route::get('/user/purchase_history', 'WebController@purchaseHistory')->name('user.purchase_history');
    Route::get('/order/{order_number}/invoice', 'WebController@orderInvoice')->name('order.invoice');
    Route::get('user/profile/edit', 'WebController@userEditProfile')->name('user.profile.edit');
    Route::post('user/complete-course', 'WebController@userCompleteCourse')->name('user.complete-course');
    Route::post('user/rate', 'WebController@userRate')->name('user.rate');
});

Route::middleware(['auth','role:Instructor'])->group(function () {
    Route::get('instructor/dashboard', 'DashboardController@dashboard')->name('instructor.dashboard');
    Route::get('instructor/profile/edit', 'instructor\InstructorController@editProfile')->name('instructor.profile.edit');
    Route::post('instructor/profile/update', 'instructor\InstructorController@updateProfile')->name('instructor.profile.update');
    Route::get('instructor/get-user-courses', 'EnrollstudentController@getUserCourses')->name('instructor.get-user-courses');
});

//Admin
Route::middleware(['auth','role:Admin'])->group(function () {
    Route::get('admin/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::get('/profile/edit', 'admin\AdminController@editProfile')->name('admin.profile.edit');
    Route::post('/profile/update', 'admin\AdminController@updateProfile')->name('admin.profile.update');

    //admin reset password
    Route::get('forgot_password', 'admin\AdminController@forgotPassword')->name('admin.forgot_password');
    Route::get('send-password-reset-link', 'admin\AdminController@passwordResetLink')->name('admin.send-password-reset-link');
    Route::get('reset-password/{token}', 'admin\AdminController@resetPassword')->name('admin.reset-password');
    Route::post('change_password', 'admin\AdminController@changePassword')->name('admin.change_password');
    Route::get('admin/orders', 'admin\AdminController@orders')->name('admin.orders');

    //pages settings
    Route::resource('admin/page', 'PageController');
    Route::resource('admin/page_setting', 'PageSettingController');

    //Roles
    Route::resource('admin/role', 'admin\RoleController');
    Route::resource('admin/permission', 'admin\PermissionController');
    Route::resource('admin/menu', 'admin\MenuController');
    Route::resource('admin/slider', 'admin\SliderController');
    Route::resource('admin/category', 'admin\CategoryController');
    Route::resource('admin/learning', 'admin\LearningController');
    Route::resource('admin/fact', 'admin\FactController');
    Route::resource('admin/trustcompany', 'admin\TrustCompanyController');
    Route::resource('admin/country', 'admin\CountryController');
    Route::resource('admin/state', 'admin\StateController');
    Route::resource('admin/city', 'admin\CityController');


    Route::resource('admin/bundle', 'admin\BundleController');
    Route::resource('admin/follower', 'FollowerController');
    Route::get('get_courses_price', 'admin\bundleController@getCoursesPrice')->name('get_courses_price');
});

Route::resource('institute', 'admin\InstituteController');
Route::resource('course', 'admin\CourseController');
Route::resource('blog', 'admin\BlogController');
Route::resource('userprofile', 'admin\UserProfileController');
Route::resource('enrollstudent', 'EnrollstudentController');
Route::resource('courseinclude', 'CourseincludeController');
Route::resource('whatlearn', 'WhatLearnController');
Route::resource('coursechapter', 'CourseChapterController');
Route::resource('courseclass', 'CourseClassController');
Route::resource('coursequestion', 'CoursequestionController');
Route::resource('courseannouncement', 'CourseannouncementController');
Route::resource('payoutsetting', 'PayoutSettingController');
Route::resource('follower', 'FollowerController');
Route::resource('meeting', 'MeetingController');

require __DIR__.'/auth.php';
