<?php
use App\Models\PageSetting;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Learning;
use App\Models\Fact;
use App\Models\Course;
use App\Models\Blog;
use App\Models\TrustCompany;
use App\Models\Institute;
use App\Models\User;
use App\Models\Bundle;

function globalData()
{
    $page_settings = PageSetting::get(['parent_slug', 'key', 'value']);
    $home_page_data = [];
    foreach ($page_settings as $key => $page_setting) {
        $home_page_data[$page_setting->key] = $page_setting->value;
    }
    return $home_page_data;
}

function menus(){
    return Menu::where('status', 1)->get();
}

function slider()
{
    return Slider::where('status', 1)->get();
}
function categories(){
    return Category::where('status', 1)->get();
}
function mainCategories(){
    return Category::where('status', 1)->where('parent_id', NULL)->get();
}
function learningLabels(){
    return Learning::where('status', 1)->get();
}
function facts(){
    return Fact::where('status', 1)->get();
}
function topDiscountCourses(){
    return Course::where('status', 1)->where('discount', '!=', NULL)->get();
}
function featuredCourses(){
    return Course::orderby('id', 'desc')->where('status', 1)->where('is_featured', 1)->get();
}
function latestBlogs()
{
    return Blog::orderby('id', 'desc')->where('status', 1)->get();
}
function trustCompanies(){
    return TrustCompany::orderby('id', 'desc')->where('status', 1)->get();
}
function institutes(){
    return Institute::orderby('id', 'desc')->where('status', 1)->get();
}

function instructors()
{
    return User::role('Instructor')->get();
}

function bundles()
{
    return Bundle::orderby('id', 'desc')->where('status', 1)->get();
}