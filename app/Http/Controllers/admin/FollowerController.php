<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Follower;
use DB;
use Session;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Follower::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("user_id", "like", "%". $request["search"] ."%");$query->orWhere("follower_id", "like", "%". $request["search"] ."%");$query->orWhere("following_id", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('followers._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'follower')->first()->label;
        $models = Follower::orderby('id', 'desc')->paginate(10);
        return view('followers.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'follower')->first()->label;
        return view('followers.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Follower::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Follower::create($input);

            DB::commit();
            return redirect()->route('follower.index')->with('message', 'Follower Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'follower')->first()->label;
        $model = Follower::findOrFail($id);
      	return view('followers.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'follower')->first()->label;
        $model = Follower::findOrFail($id);
        return view('followers.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Follower::findOrFail($id);

	    $this->validate($request, Follower::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('follower.index')->with('message', 'Follower update Successfully !');
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
        $model = Follower::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
