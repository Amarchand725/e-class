<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Factor;
use DB;
use Session;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Factor::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("image", "like", "%". $request["search"] ."%");$query->orWhere("counter", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('factors._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'factor')->first()->label;
        $models = Factor::orderby('id', 'desc')->paginate(10);
        return view('factors.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'factor')->first()->label;
        return view('factors.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Factor::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Factor::create($input);

            DB::commit();
            return redirect()->route('factor.index')->with('message', 'Factor Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'factor')->first()->label;
        $model = Factor::findOrFail($id);
      	return view('factors.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'factor')->first()->label;
        $model = Factor::findOrFail($id);
        return view('factors.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Factor::findOrFail($id);

	    $this->validate($request, Factor::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('factor.index')->with('message', 'Factor update Successfully !');
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
        $model = Factor::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
