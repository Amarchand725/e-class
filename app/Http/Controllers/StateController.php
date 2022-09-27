<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\State;
use App\Models\Country;
use DB;
use Session;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = State::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("country_id", "like", "%". $request["search"] ."%");$query->orWhere("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('states._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'state')->first()->label;
        $models = State::orderby('id', 'desc')->paginate(10);
        return view('states.index', compact('models', 'page_title'));
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json(['states'=> $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'state')->first()->label;
        $countries = Country::where('status', 1)->get();
        return view('states.create', compact('view_all_title', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, State::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        State::create($input);

            DB::commit();
            return redirect()->route('state.index')->with('message', 'State Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'state')->first()->label;
        $model = State::findOrFail($id);
        $countries = Country::where('status', 1)->get();
      	return view('states.show', compact('view_all_title', 'model', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'state')->first()->label;
        $model = State::findOrFail($id);
        $countries = Country::where('status', 1)->get();
        return view('states.edit', compact('view_all_title', 'model', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = State::findOrFail($id);

	    $this->validate($request, State::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('state.index')->with('message', 'State update Successfully !');
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
        $model = State::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
