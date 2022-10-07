<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Coursequestion;
use DB;
use Session;

class CoursequestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Coursequestion::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("question", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('coursequestions._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'coursequestion')->first()->label;
        $models = Coursequestion::orderby('id', 'desc')->paginate(10);
        return view('coursequestions.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'coursequestion')->first()->label;
        return view('coursequestions.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Coursequestion::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if(isset($request->status)){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
	        $model = Coursequestion::create($input);

            DB::commit();
            if($model){
                $coursequestions = Coursequestion::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                $listing = (string) view('web-views.website.courseincludes.questions.listing', compact('coursequestions'));
                return response()->json(['code'=>200, 'listing'=>$listing]);
            }
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
        $view_all_title = Menu::where('menu', 'coursequestion')->first()->label;
        $model = Coursequestion::findOrFail($id);
      	return view('coursequestions.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'coursequestion')->first()->label;
        $model = Coursequestion::findOrFail($id);
        return view('coursequestions.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Coursequestion::findOrFail($id);

        try{
            if(isset($request->change_status)){
                if($model->status==1){
                    $model->status = 0;
                }else{
                    $model->status = 1;
                }
                $model->save();
                if($model){
                    $coursequestions = Coursequestion::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                    $listing = (string) view('web-views.website.courseincludes.questions.listing', compact('coursequestions'));
                    return response()->json(['code'=>200, 'listing'=>$listing]);
                }
            }
    
            $input = $request->all();
            $this->validate($request, Coursequestion::getValidationRules());
    
            try{
                $input = $request->except(['status']);
                $model->fill( $input )->save();
                
                DB::commit();
                if($model){
                    $coursequestions = Coursequestion::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                    $listing = (string) view('web-views.website.courseincludes.questions.listing', compact('coursequestions'));
                    return response()->json(['code'=>200, 'listing'=>$listing]);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['error'=>'Error. '.$e->getMessage()], 500);
            }
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
        $model = Coursequestion::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
