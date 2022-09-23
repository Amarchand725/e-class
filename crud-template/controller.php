namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\{modelName};
use DB;
use Session;

class {ControllerName} extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = {modelName}::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                {searchColumns}
            }
            $models = $query->paginate(10);
            return (string) view('{viewFolderName}._search', compact('models'));
        }

        $page_title = Menu::where('menu', '{menuName}')->first()->label;
        $models = {modelName}::orderby('id', 'desc')->paginate(10);
        return view('{viewFolderName}.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', '{menuName}')->first()->label;
        return view('{viewFolderName}.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, {modelName}::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        {modelName}::create($input);

            DB::commit();
            return redirect()->route('{menuName}.index')->with('message', '{modelName} Added Successfully !');
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
        $view_all_title = Menu::where('menu', '{menuName}')->first()->label;
        $model = {modelName}::findOrFail($id);
      	return view('{viewFolderName}.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', '{menuName}')->first()->label;
        $model = {modelName}::findOrFail($id);
        return view('{viewFolderName}.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = {modelName}::findOrFail($id);

	    $this->validate($request, {modelName}::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('{menuName}.index')->with('message', '{modelName} update Successfully !');
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
        $model = {modelName}::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
