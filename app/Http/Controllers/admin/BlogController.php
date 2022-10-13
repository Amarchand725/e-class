<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Blog;
use DB;
use Session;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Blog::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("created_by", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");$query->orWhere("attachment", "like", "%". $request["search"] ."%");$query->orWhere("extension", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('blogs._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'blog')->first()->label;
        $models = Blog::orderby('id', 'desc')->paginate(10);
        return view('blogs.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'blog')->first()->label;
        return view('blogs.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Blog::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->attachment)) {
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $extension = $request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/admin/images/blogs'), $attachment);
                $input['attachment'] = $attachment;
                $input['extension'] = $extension;
            }

            $input['created_by'] = Auth::user()->id;
	        Blog::create($input);

            DB::commit();
            return redirect()->route('blog.index')->with('message', 'Blog Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'blog')->first()->label;
        $model = Blog::findOrFail($id);
      	return view('blogs.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'blog')->first()->label;
        $model = Blog::findOrFail($id);
        return view('blogs.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Blog::findOrFail($id);

	    $this->validate($request, Blog::getValidationRules());

        try{
            if (isset($request->attachment)) {
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $extension = $request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/admin/images/blogs'), $attachment);
                $model->attachment = $attachment;
                $model->extension = $extension;
            }

	        $model->save();
            return redirect()->route('blog.index')->with('message', 'Blog update Successfully !');
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
        $model = Blog::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
