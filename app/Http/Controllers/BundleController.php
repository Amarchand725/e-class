<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Bundle;
use App\Models\Course;
use DB;
use Session;
use Auth;
use Illuminate\Support\Str;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Bundle::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("course_ids", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("short_detail", "like", "%". $request["search"] ."%");$query->orWhere("details", "like", "%". $request["search"] ."%");$query->orWhere("banner", "like", "%". $request["search"] ."%");$query->orWhere("is_paid", "like", "%". $request["search"] ."%");$query->orWhere("is_featured", "like", "%". $request["search"] ."%");$query->orWhere("start_from", "like", "%". $request["search"] ."%");$query->orWhere("end_date", "like", "%". $request["search"] ."%");$query->orWhere("retail_price", "like", "%". $request["search"] ."%");$query->orWhere("price", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('bundles._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'bundle')->first()->label;
        $models = Bundle::orderby('id', 'desc')->paginate(10);
        return view('bundles.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'bundle')->first()->label;
        $courses = Course::orderby('id', 'desc')->where('status', 1)->where('is_paid', 1)->get();
        return view('bundles.create', compact('view_all_title', 'courses'));
    }

    public function getCoursesPrice(Request $request)
    {
        $retail_total_amount = 0;
        foreach($request->course_ids as $course_id){
            $retail_total_amount += Course::where('id', $course_id)->first()->price;
        }

        return $retail_total_amount;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Bundle::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->banner)) {
                $banner = date('d-m-Y-His').'.'.$request->file('banner')->getClientOriginalExtension();
                $request->banner->move(public_path('/admin/bundle/banners'), $banner);
                $input['banner'] = $banner;
            }

            $input['slug'] = Str::slug($request->title);
            $input['course_ids'] = json_encode($request->course_ids);
            $input['user_slug'] = Auth::user()->slug;

	        Bundle::create($input);

            DB::commit();
            return redirect()->route('bundle.index')->with('message', 'Bundle Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'bundle')->first()->label;
        $model = Bundle::findOrFail($id);
      	return view('bundles.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'bundle')->first()->label;
        $model = Bundle::findOrFail($id);
        $courses = Course::orderby('id', 'desc')->where('status', 1)->where('is_paid', 1)->get();
        return view('bundles.edit', compact('view_all_title', 'model', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Bundle::findOrFail($id);

        if(isset($request->change_status)){
            if($model->status==1){
                $model->status = 0;
            }else{
                $model->status = 1;
            }
            $model->save();
            if($model){
                return response()->json(['code'=>200]);
            }
        }

        if(isset($request->is_featured)){
            if($model->is_featured==1){
                $model->is_featured = 0;
            }else{
                $model->is_featured = 1;
            }
            $model->save();
            if($model){
                return response()->json(['code'=>200]);
            }
        }

        if(!$model->banner){
	        $this->validate($request, Bundle::getValidationRules());
        }else{
            $this->validate($request, Bundle::getEditValidationRules());
        }

        try{
            if (isset($request->banner)) {
                $banner = date('d-m-Y-His').'.'.$request->file('banner')->getClientOriginalExtension();
                $request->banner->move(public_path('/admin/bundle/banners'), $banner);
                $input['banner'] = $banner;
            }

            $input['slug'] = Str::slug($request->title);
            $input['course_ids'] = json_encode($request->course_ids);

            $input = $request->except(['status']);
            $input = $request->except(['is_featured']);

            DB::commit();
            $model->fill( $input )->save();
            return redirect()->route('bundle.index')->with('message', 'Bundle Added Successfully !');
            
	        /* $model->fill( $request->all() )->save();
            return redirect()->route('bundle.index')->with('message', 'Bundle update Successfully !'); */
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
        $model = Bundle::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
