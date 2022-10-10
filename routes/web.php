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

Route::get('/', 'WebController@index');

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
Route::resource('crud', 'App\Http\Controllers\CrudController'); */

//web
Route::get('/institute/{slug}/single', 'WebController@instituteSingle')->name('institute.single');
Route::get('/course/{slug}/single', 'WebController@courseSingle')->name('course.single');
Route::get('/bundle/{slug}/single', 'WebController@bundleSingle')->name('bundle.single');
Route::get('/user/{slug}/profile', 'WebController@userProfile')->name('user.profile');
Route::post('/user/store', 'WebController@userStore')->name('user.store');

Route::group(['middleware' => 'guest'], function(){
    Route::view('/admin/login','admin.auth.login')->name('admin.login');
    Route::post('/admin/login',[App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.login');
});

Route::group(['middleware' => 'auth'], function(){
// Route::group(['middleware' => ['Admin'], function () use ($routes){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile/edit', 'AdminController@editProfile')->name('admin.profile.edit');
    Route::post('/profile/update', 'AdminController@updateProfile')->name('admin.profile.update');
    Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    //admin reset password
    Route::get('forgot_password', 'AdminController@forgotPassword')->name('admin.forgot_password');
    Route::get('send-password-reset-link', 'AdminController@passwordResetLink')->name('admin.send-password-reset-link');
    Route::get('reset-password/{token}', 'AdminController@resetPassword')->name('admin.reset-password');
    Route::post('change_password', 'AdminController@changePassword')->name('admin.change_password');

    //pages settings
    Route::resource('page', 'PageController');
    Route::resource('page_setting', 'PageSettingController');

    //Roles
    Route::resource('role', 'RoleController');

    Route::resource('menu', 'MenuController');

    Route::resource('admin/slider', 'SliderController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/learning', 'LearningController');

    Route::resource('admin/fact', 'FactController');

    Route::resource('admin/course', 'CourseController');

    Route::resource('admin/blog', 'BlogController');

    Route::resource('admin/trustcompany', 'TrustCompanyController');
    Route::resource('admin/country', 'CountryController');
    Route::resource('admin/country', 'CountryController');
    Route::resource('admin/country', 'CountryController');
    Route::resource('admin/state', 'StateController');
    Route::resource('admin/state', 'StateController');
    Route::resource('admin/city', 'CityController');

    Route::get('admin/get_states', 'StateController@getStates')->name('admin.get_states');
    Route::get('admin/get_cities', 'CityController@getCities')->name('admin.get_cities');

    Route::get('get_courses_price', 'bundleController@getCoursesPrice')->name('get_courses_price');
});
// }]);

require __DIR__.'/auth.php';


Route::resource('admin/userprofile', 'UserProfileController');
 
Route::resource('admin/institute', 'InstituteController');
 
Route::resource('admin/courseinclude', 'CourseincludeController');
Route::resource('admin/whatlearn', 'WhatLearnController');
Route::resource('admin/coursechapter', 'CourseChapterController');
Route::resource('admin/courseclass', 'CourseClassController');
Route::resource('admin/coursequestion', 'CoursequestionController');
Route::resource('admin/courseannouncement', 'CourseannouncementController');
Route::resource('admin/follower', 'FollowerController');
Route::resource('admin/wishlist', 'WishlistController');
Route::resource('admin/bundle', 'BundleController');