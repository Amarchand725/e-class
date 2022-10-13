<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TrustCompany;
use DB;
use Session;

class TrustCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = TrustCompany::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");$query->orWhere("logo", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('trustcompanies._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'trustcompany')->first()->label;
        $models = TrustCompany::orderby('id', 'desc')->paginate(10);
        return view('trustcompanies.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'trustcompany')->first()->label;
        return view('trustcompanies.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, TrustCompany::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->logo)) {
                $logo = date('d-m-Y-His').'.'.$request->file('logo')->getClientOriginalExtension();
                $request->logo->move(public_path('/admin/images/trust-companies'), $logo);
                $input['logo'] = $logo;
            }

	        TrustCompany::create($input);

            DB::commit();
            return redirect()->route('trustcompany.index')->with('message', 'TrustCompany Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'trustcompany')->first()->label;
        $model = TrustCompany::findOrFail($id);
      	return view('trustcompanies.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'trustcompany')->first()->label;
        $model = TrustCompany::findOrFail($id);
        return view('trustcompanies.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = TrustCompany::findOrFail($id);
        $input = $request->all();

        if(!$model->logo){
            $this->validate($request, TrustCompany::getValidationRules());
        }else{
            $rules = [
                'name' => 'required'
            ];

            $this->validate($request, $rules);
        }

        try{
            if (isset($request->logo)) {
                $exist_logo_path = public_path('/admin/images/trust-companies');
                $exist_logo = $exist_logo_path.'/'.$model->logo;
                if($model->logo){
                    unlink($exist_logo);
                }
                $logo = date('d-m-Y-His').'.'.$request->file('logo')->getClientOriginalExtension();
                $request->logo->move(public_path('/admin/images/trust-companies'), $logo);
                $input['logo'] = $logo;
            }

            $model->fill( $input )->save();

            return redirect()->route('trustcompany.index')->with('message', 'TrustCompany update Successfully !');
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
        $model = TrustCompany::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
