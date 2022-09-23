<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Slider;
use DB;
use Session;
use Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Slider::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("created_by", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("sub_title", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");$query->orWhere("image", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('sliders._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'slider')->first()->label;
        $models = Slider::orderby('id', 'desc')->paginate(10);
        return view('sliders.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'slider')->first()->label;
        return view('sliders.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Slider::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->image)) {
                $image = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('/admin/images/sliders'), $image);
                $input['image'] = $image;
            }

            $input['created_by'] = Auth::user()->id;
	        Slider::create($input);

            DB::commit();
            return redirect()->route('slider.index')->with('message', 'Slider Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'slider')->first()->label;
        $model = Slider::findOrFail($id);
      	return view('sliders.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'slider')->first()->label;
        $model = Slider::findOrFail($id);
        return view('sliders.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Slider::findOrFail($id);

        if(!$model->image){
            $this->validate($request, Slider::getValidationRules());
        }else{
            $rules = [
                'title' => 'required'
            ];
    
            $this->validate($request, $rules);
        }

        try{
            if (isset($request->image)) {
                $image = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('/admin/images/sliders'), $image);
                $model['image'] = $image;
            }

	        $model->fill( $request->all() )->save();
            return redirect()->route('slider.index')->with('message', 'Slider update Successfully !');
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
        $model = Slider::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
