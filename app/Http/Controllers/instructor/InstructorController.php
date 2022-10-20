<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use DB;

class InstructorController extends Controller
{
    public function editProfile()
    {
        return 'good';
        $countries = Country::get();
        $states = State::where('country_id', Auth::user()->hasUserProfile->country_id)->get();
        $cities = City::where('state_id', Auth::user()->hasUserProfile->state_id)->get();
        return view('web-views.website.user.edit-profile', compact('countries', 'states', 'cities'));
    }
}
