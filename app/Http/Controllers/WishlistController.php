<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Wishlist;
use DB;
use Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Wishlist::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("user_id", "like", "%". $request["search"] ."%");$query->orWhere("course_id", "like", "%". $request["search"] ."%");$query->orWhere("live_meeting_id", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('wishlists._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'wishlist')->first()->label;
        $models = Wishlist::orderby('id', 'desc')->paginate(10);
        return view('wishlists.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'wishlist')->first()->label;
        return view('wishlists.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Wishlist::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Wishlist::create($input);

            DB::commit();
            return redirect()->route('wishlist.index')->with('message', 'Wishlist Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'wishlist')->first()->label;
        $model = Wishlist::findOrFail($id);
      	return view('wishlists.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'wishlist')->first()->label;
        $model = Wishlist::findOrFail($id);
        return view('wishlists.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Wishlist::findOrFail($id);

	    $this->validate($request, Wishlist::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('wishlist.index')->with('message', 'Wishlist update Successfully !');
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
        $model = Wishlist::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
