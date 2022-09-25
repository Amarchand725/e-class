<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use DB;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Category::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("parent_id", "like", "%". $request["search"] ."%");$query->orWhere("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");$query->orWhere("icon", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('categories._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'category')->first()->label;
        $models = Category::orderby('id', 'desc')->paginate(10);
        return view('categories.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'category')->first()->label;
        return view('categories.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Category::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Category::create($input);

            DB::commit();
            return redirect()->route('category.index')->with('message', 'Category Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'category')->first()->label;
        $model = Category::findOrFail($id);
      	return view('categories.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'category')->first()->label;
        $model = Category::findOrFail($id);
        return view('categories.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Category::findOrFail($id);

	    $this->validate($request, Category::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('category.index')->with('message', 'Category update Successfully !');
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
        $model = Category::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
