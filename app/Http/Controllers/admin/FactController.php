<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Fact;
use DB;
use Session;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Fact::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("image", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("counter", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('facts._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'fact')->first()->label;
        $models = Fact::orderby('id', 'desc')->paginate(10);
        return view('facts.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'fact')->first()->label;
        return view('facts.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Fact::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->image)) {
                $image = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('/admin/images/facts'), $image);
                $input['image'] = $image;
            }

	        Fact::create($input);

            DB::commit();
            return redirect()->route('fact.index')->with('message', 'Fact Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'fact')->first()->label;
        $model = Fact::findOrFail($id);
      	return view('facts.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'fact')->first()->label;
        $model = Fact::findOrFail($id);
        return view('facts.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Fact::findOrFail($id);

        if(!$model->image){
            $this->validate($request, Fact::getValidationRules());
        }else{
            $rules = [
                'title' => 'required',
            ];

            $this->validate($request, $rules);
        }

        try{
            if (isset($request->image)) {
                $image = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('/admin/images/facts'), $image);
                $request['image'] = $image;
            }

	        $model->fill( $request->all() )->save();
            return redirect()->route('fact.index')->with('message', 'Fact update Successfully !');
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
        $model = Fact::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
