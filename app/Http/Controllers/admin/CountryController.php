<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Country;
use DB;
use Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Country::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("name", "like", "%". $request["search"] ."%");
                $query->orWhere("phonecode", "like", "%". $request["search"] ."%");
                $query->orWhere("currency", "like", "%". $request["search"] ."%");
                $query->orWhere("currency_symbol", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('countries._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'country')->first()->label;
        $models = Country::orderby('id', 'desc')->paginate(10);
        return view('countries.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'country')->first()->label;
        return view('countries.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Country::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->flag)) {
                $flag = date('d-m-Y-His').'.'.$request->file('flag')->getClientOriginalExtension();
                $request->flag->move(public_path('/admin/images/countries'), $flag);
                $input['flag'] = $flag;
            }
	        Country::create($input);

            DB::commit();
            return redirect()->route('country.index')->with('message', 'Country Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'country')->first()->label;
        $model = Country::findOrFail($id);
      	return view('countries.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'country')->first()->label;
        $model = Country::findOrFail($id);
        return view('countries.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Country::findOrFail($id);

	    $this->validate($request, Country::getValidationRules());
        $input = $request->all();

        try{
            if (isset($request->flag)) {
                $exist_image = public_path('/admin/images/countries');
                if($model->flag){
                    $exist = $exist_image.'/'.$model->flag;
                    unlink($exist);
                }

                $flag = date('d-m-Y-His').'.'.$request->file('flag')->getClientOriginalExtension();
                $request->flag->move(public_path('/admin/images/countries'), $flag);
                $input['flag'] = $flag;
            }

	        $model->fill($input)->save();
            return redirect()->route('country.index')->with('message', 'Country update Successfully !');
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
        $model = Country::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
