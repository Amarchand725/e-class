<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionUrl;
use DB;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    } */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Permission::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            $permissions = $query->paginate(10);
            return (string) view('admin.permission.search', compact('permissions'));
        }
        $page_title = 'All Permissions';
        $permissions = Permission::orderby('id','DESC')->paginate(10);
        return view('admin.permission.index', compact('permissions', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $page_title = 'Add Permission';
        return view('admin.permission.create',compact('permission', 'page_title'));
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
            'name' => 'required',
        ]);

        DB::beginTransaction();
        
        $bool = false;

        try{
            if(!empty($request->permissions)){
                $ifnotfound = Permission::where('name', Str::lower($request->name))->first();
                if(empty($ifnotfound)){
                    $model = Permission::create([
                        'name' =>  Str::lower($request->name),
                        'guard_name' => 'web',
                    ]);
                }else{
                    $bool = true;
                }

                if($model){
                    foreach($request->permissions as $permission){
                        PermissionUrl::create([
                            'permission_id' =>  $model->id,
                            'permission' => $permission,
                        ]);
                    }
                }
            }else{
                $bool = false;
                $model = Permission::create([
                    'name' =>  Str::lower($request->name),
                    'guard_name' => 'web',
                ]);
                if($model){
                    PermissionUrl::create([
                        'permission_id' =>  $model->id,
                        'permission' => $permission,
                    ]);
                }
            }

            DB::commit();
            if($bool){
                return redirect()->route('permission.index')
                ->with('message','Avaialable this permission already.');
            }
            return redirect()->route('permission.index')->with('message','Permission created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Permission::find($id);
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
        $permission = Permission::find($id);
        $page_title = 'Edit Permission';

        return view('admin.permission.edit',compact('permission', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = Str::lower($request->name);
        $permission->save();

        if(count($permission->havePermissionUrls) != count($request->permissions)){
            PermissionUrl::where('permission_id', $permission->id)->delete();
            foreach($request->permissions as $permission_val){
                PermissionUrl::create([
                    'permission_id' =>  $permission->id,
                    'permission' => $permission_val,
                ]);
            }
        }

        return redirect()->route('permission.index')
                        ->with('message','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Permission::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
