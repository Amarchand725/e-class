<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use App\Models\Permission;
use DB;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Role::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            $roles = $query->paginate(10);
            return (string) view('admin.role.search', compact('roles'));
        }
        $page_title = 'All Roles';
        $roles = Role::orderBy('id','DESC')->paginate(10);
        return view('admin.role.index',compact('roles','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $page_title = 'Add Role';
        return view('admin.role.create',compact('permission', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:roles', 'max:100'],
            // 'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->name, 'description'=>$request->description]);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')
                        ->with('message','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $page_title = 'Edit Role';
        $permission = Permission::with('havePermissionUrls')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.role.edit',compact('role','permission','rolePermissions', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'permission' => 'required',
        ]);

        $role = Role::find($request->role_id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')
                        ->with('message','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ifdeleted = DB::table("roles")->where('id',$id)->delete();
        if($ifdeleted){
            return true;
        }
    }
}
