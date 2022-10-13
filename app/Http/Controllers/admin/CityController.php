<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use DB;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = City::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("name", "like", "%". $request["search"] ."%");
            }
            if($request['country'] != 'All'){
                $query->where("country_id", $request['country']);
            }
            if($request['state'] != 'All'){
                $query->where("state_id", "like", "%". $request['state'] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('cities._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'city')->first()->label;
        $countries = Country::orderby('id', 'desc')->get();
        $models = City::orderby('id', 'desc')->paginate(10);

        return view('cities.index', compact('models', 'page_title', 'countries'));
    }

    public function getCities(Request $request)
    {
        $states = City::where('state_id', $request->state_id)->get();
        return response()->json(['states'=> $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'city')->first()->label;
        $countries = Country::where('status', 1)->get();
        return view('cities.create', compact('view_all_title', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, City::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        City::create($input);

            DB::commit();
            return redirect()->route('city.index')->with('message', 'City Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'city')->first()->label;
        $model = City::findOrFail($id);
      	return view('cities.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'city')->first()->label;
        $model = City::findOrFail($id);
        $countries = Country::where('status', 1)->get();
        $states = State::where('country_id', $model->country_id)->get();
        return view('cities.edit', compact('view_all_title', 'model', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = City::findOrFail($id);

	    $this->validate($request, City::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('city.index')->with('message', 'City update Successfully !');
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
        $model = City::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
