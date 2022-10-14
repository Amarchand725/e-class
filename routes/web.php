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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'WebController@index')->name('home');

//Frontend
Route::get('/institute/{slug}/single', 'WebController@instituteSingle')->name('institute.single');
Route::get('/course/{slug}/single', 'WebController@courseSingle')->name('course.single');
Route::get('/bundle/{slug}/single', 'WebController@bundleSingle')->name('bundle.single');
Route::get('/user/{slug}/profile', 'WebController@userProfile')->name('user.profile');
Route::post('/user/store', 'WebController@userStore')->name('user.store');

//cart
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'CartController@update')->name('update.cart');
Route::delete('remove-from-cart', 'CartController@remove')->name('remove.from.cart');

Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('complete-order', 'CartController@completeOrder')->name('complete-orrder');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/admin/login','DashboardController@login')->name('admin.login');
    Route::post('/admin/login', 'DashboardController@authenticate')->name('admin.login');
});

Route::post('/logout', 'DashboardController@logout')->name('logout');

Route::middleware(['auth','role:Instructor'])->group(function () {
    Route::get('instructor/dashboard', 'DashboardController@dashboard')->name('instructor.dashboard');
    Route::get('instructor/profile/edit', 'InstructorController@editProfile')->name('instructor.profile.edit');
    Route::post('instructor/profile/update', 'InstructorController@updateProfile')->name('instructor.profile.update');
});

//Admin
Route::middleware(['auth','role:Admin'])->group(function () {
    Route::get('admin/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::get('/profile/edit', 'AdminController@editProfile')->name('admin.profile.edit');
    Route::post('/profile/update', 'AdminController@updateProfile')->name('admin.profile.update');

    //admin reset password
    Route::get('forgot_password', 'AdminController@forgotPassword')->name('admin.forgot_password');
    Route::get('send-password-reset-link', 'AdminController@passwordResetLink')->name('admin.send-password-reset-link');
    Route::get('reset-password/{token}', 'AdminController@resetPassword')->name('admin.reset-password');
    Route::post('change_password', 'AdminController@changePassword')->name('admin.change_password');

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
    Route::resource('admin/course', 'admin\CourseController');
    Route::resource('admin/blog', 'admin\BlogController');
    Route::resource('admin/trustcompany', 'admin\TrustCompanyController');
    Route::resource('admin/country', 'admin\CountryController');
    Route::resource('admin/state', 'admin\StateController');
    Route::resource('admin/city', 'admin\CityController');
    Route::resource('admin/userprofile', 'admin\UserProfileController');
    Route::resource('admin/institute', 'admin\InstituteController');
    Route::resource('admin/bundle', 'admin\BundleController');
    Route::resource('admin/follower', 'admin\FollowerController');

    Route::get('admin/get_states', 'admin\StateController@getStates')->name('admin.get_states');
    Route::get('admin/get_cities', 'admin\CityController@getCities')->name('admin.get_cities');
    Route::get('get_courses_price', 'admin\bundleController@getCoursesPrice')->name('get_courses_price');
});

require __DIR__.'/auth.php';