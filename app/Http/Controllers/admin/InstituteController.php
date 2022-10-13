<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Institute;
use DB;
use Session;
use Illuminate\Support\Str;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Institute::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("logo", "like", "%". $request["search"] ."%");$query->orWhere("name", "like", "%". $request["search"] ."%");$query->orWhere("email", "like", "%". $request["search"] ."%");$query->orWhere("mobile", "like", "%". $request["search"] ."%");$query->orWhere("skill", "like", "%". $request["search"] ."%");$query->orWhere("address", "like", "%". $request["search"] ."%");$query->orWhere("affilated_by", "like", "%". $request["search"] ."%");$query->orWhere("about", "like", "%". $request["search"] ."%");$query->orWhere("is_verified", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('institutes._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'institute')->first()->label;
        $models = Institute::orderby('id', 'desc')->paginate(10);
        return view('institutes.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'institute')->first()->label;
        return view('institutes.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Institute::getValidationRules());
        
        $skills = $request->skill;
        $input = $request->except(['_token', 'skill']);

        DB::beginTransaction();

        try{
            if (isset($request->logo)) {
                $logo = date('d-m-Y-His').'.'.$request->file('logo')->getClientOriginalExtension();
                $request->logo->move(public_path('/admin/images/institutes'), $logo);
                $input['logo'] = $logo;
            }
            $input['skill'] = json_encode($skills);
            $input['slug'] = Str::slug($request->name);
	        Institute::create($input);

            DB::commit();
            return redirect()->route('institute.index')->with('message', 'Institute Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'institute')->first()->label;
        $model = Institute::findOrFail($id);
      	return view('institutes.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'institute')->first()->label;
        $model = Institute::findOrFail($id);
        return view('institutes.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Institute::findOrFail($id);

        $skills = $request->skill;
        $input = $request->except(['_patch', 'skill']);
        
        if(empty($model->logo)){
	        $this->validate($request, Institute::getValidationRules());
        }else{
            $rules = Institute::getValidationRules();
            unset($rules['logo']);
            $this->validate($request, $rules);
        }

        try{
            if (isset($request->logo)) {
                $exist_image = public_path('/admin/images/institutes');
                if($model->logo){
                    $exist = $exist_image.'/'.$model->logo;
                    unlink($exist);
                }

                $logo = date('d-m-Y-His').'.'.$request->file('logo')->getClientOriginalExtension();
                $request->logo->move(public_path('/admin/images/institutes'), $logo);
                $input['logo'] = $logo;
            }
            $input['skill'] = json_encode($skills);
            $input['slug'] = Str::slug($request->name);
	        $model->fill( $input )->save();
            return redirect()->route('institute.index')->with('message', 'Institute update Successfully !');
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
        $model = Institute::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
