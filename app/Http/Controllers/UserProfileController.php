<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Role as UserRole;
use Spatie\Permission\Models\Role;
use Str;

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
        $roles = Role::where('name', '!=', 'Admin')->where('status', 1)->get();
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
        $this->validate($request, User::getValidationRules());
        $this->validate($request, UserProfile::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            $name = $request->first_name.' '.$request->last_name;

            $slug = '';
            do{
                $slug = Str::random(2);
                $slug = Str::slug('amarchand').'-'.strtolower($slug);
            }while(User::where('slug', $slug)->first());

            $user = User::create([
                'name' => $name,
                'slug' => $slug,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->input('role_id'));

            if($user){
                $input = $request->except(['_token', 'role_id', 'email', 'password', 'confirmed']);

                if (isset($request->profile_image)) {
                    $profile_image = date('d-m-Y-His').'.'.$request->file('profile_image')->getClientOriginalExtension();
                    $request->profile_image->move(public_path('/admin/images/profiles'), $profile_image);
                    $input['profile_image'] = $profile_image;
                }

                $input['user_id'] = $user->id;

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
        $model = User::findOrFail($id);
        $roles = Role::where('name', '!=', 'Admin')->where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $states = State::where('country_id', $model->hasUserProfile->country_id)->where('status', 1)->get();
        $cities = City::where('state_id', $model->hasUserProfile->state_id)->where('status', 1)->get();
        return view('userprofiles.edit', compact('view_all_title', 'model', 'roles', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $model = UserProfile::where('user_id', $user->id)->first();

        $this->validate($request, UserProfile::getValidationRules());
        
        $rules = [
            'email' => 'unique:users,email,'.$id,
		];

        if($request->password){
            $rules['password'] = 'required|same:confirmed';
        }

        $this->validate($request, $rules);
        DB::beginTransaction();

        try{
            $user->email = $request->email;
            if(!empty($request->password)){
                $user->password = $request->password;
            }
            $user->status = $request->status;
            $user->save();
            $user->assignRole($request->input('role_id'));

            if($user){
                $input = $request->except(['_method', 'role_id', 'email', 'password', 'confirmed']);
                if (isset($request->profile_image)) {
                    $exist_image = public_path('/admin/images/profiles');
                    if($model->profile_image){
                        $exist = $exist_image.'/'.$model->profile_image;
                        unlink($exist);
                    }

                    $profile_image = date('d-m-Y-His').'.'.$request->file('profile_image')->getClientOriginalExtension();
                    $request->profile_image->move(public_path('/admin/images/profiles'), $profile_image);
                    $input['profile_image'] = $profile_image;
                }

                $input['user_id'] = $user->id;

                $model->fill($input)->save();
            }

            DB::commit();

            return redirect()->route('userprofile.index')->with('message', 'User update Successfully !');
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
