<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Learning;
use DB;
use Session;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Learning::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("icon", "like", "%". $request["search"] ."%");$query->orWhere("label", "like", "%". $request["search"] ."%");$query->orWhere("message", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('learnings._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'learning')->first()->label;
        $models = Learning::orderby('id', 'desc')->paginate(10);
        return view('learnings.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'learning')->first()->label;
        return view('learnings.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Learning::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Learning::create($input);

            DB::commit();
            return redirect()->route('learning.index')->with('message', 'Learning Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'learning')->first()->label;
        $model = Learning::findOrFail($id);
      	return view('learnings.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'learning')->first()->label;
        $model = Learning::findOrFail($id);
        return view('learnings.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Learning::findOrFail($id);

	    $this->validate($request, Learning::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('learning.index')->with('message', 'Learning update Successfully !');
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
        $model = Learning::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
