<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("user_id", "like", "%". $request["search"] ."%");$query->orWhere("first_name", "like", "%". $request["search"] ."%");$query->orWhere("last_name", "like", "%". $request["search"] ."%");$query->orWhere("email", "like", "%". $request["search"] ."%");$query->orWhere("mobile", "like", "%". $request["search"] ."%");$query->orWhere("role_id", "like", "%". $request["search"] ."%");$query->orWhere("password", "like", "%". $request["search"] ."%");$query->orWhere("address", "like", "%". $request["search"] ."%");$query->orWhere("country_id", "like", "%". $request["search"] ."%");$query->orWhere("state_id", "like", "%". $request["search"] ."%");$query->orWhere("city_id", "like", "%". $request["search"] ."%");$query->orWhere("profile_image", "like", "%". $request["search"] ."%");$query->orWhere("facebook_url", "like", "%". $request["search"] ."%");$query->orWhere("twitter_url", "like", "%". $request["search"] ."%");$query->orWhere("youtube_url", "like", "%". $request["search"] ."%");$query->orWhere("linked_in_url", "like", "%". $request["search"] ."%");$query->orWhere("details", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('userprofiles._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'userprofile')->first()->label;
        $models = User::orderby('id', 'desc')->paginate(10);
        return view('userprofiles.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'userprofile')->first()->label;
        $roles = Role::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        return view('userprofiles.create', compact('view_all_title', 'roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // return $request;

        $this->validate($request, User::getValidationRules());
        $this->validate($request, UserProfile::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            $user = User::create([
                'name' => $request->first_name.' '.$request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->role_id);

            if($user){
                $input = $request->except(['_token', 'role_id', 'email', 'password', 'confirmed']);

                if (isset($request->profile_image)) {
                    $profile_image = date('d-m-Y-His').'.'.$request->file('profile_image')->getClientOriginalExtension();
                    $request->profile_image->move(public_path('/admin/images/profiles'), $profile_image);
                    $input['profile_image'] = $profile_image;
                }

                UserProfile::create($input);
            }

            DB::commit();
            return redirect()->route('userprofile.index')->with('message', 'User Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $view_all_title = Menu::where('menu', 'userprofile')->first()->label;
        $model = User::findOrFail($id);
      	return view('userprofiles.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'userprofile')->first()->label;
        $model = UserProfile::findOrFail($id);
        return view('userprofiles.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = UserProfile::findOrFail($id);

	    $this->validate($request, UserProfile::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('userprofile.index')->with('message', 'UserProfile update Successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = UserProfile::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
