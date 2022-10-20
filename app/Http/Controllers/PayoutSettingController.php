<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PayoutSetting;
use App\Models\User;
use DB;
use Session;
use Auth;
use Illuminate\Support\Str;

class PayoutSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = PayoutSetting::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("type", "like", "%". $request["search"] ."%");
                $query->orWhere("bank", "like", "%". $request["search"] ."%");
                $query->orWhere("account_title", "like", "%". $request["search"] ."%");
                $query->orWhere("account_number", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('payoutsetting._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'payoutsetting')->first()->label;
        $models = PayoutSetting::orderby('id', 'desc')->paginate(10);
        return view('payoutsetting.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'payoutsetting')->first()->label;
        return view('payoutsetting.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required',
            'bank_name' => 'required',
            'account_title' => 'required',
            'account_number' => 'required',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try{
            $account = PayoutSetting::create([
                'user_slug' => Auth::user()->slug,
                'type' => $request->type,
                'bank' => $request->bank_name,
                'account_title' => $request->account_title,
                'account_number' => $request->account_number,
            ]);

            DB::commit();
            return redirect()->route('payoutsetting.edit', $account->id)->with('message', 'You have added account details successfully. !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayoutSetting  $PayoutSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_all_title = Menu::where('menu', 'payoutsetting')->first()->label;
        $model = PayoutSetting::findOrFail($id);
      	return view('payoutsetting.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayoutSetting  $PayoutSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = PayoutSetting::findOrFail($id);
        $view_all_title = Menu::where('menu', 'payoutsetting')->first()->label;
       
        return view('payoutsetting.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayoutSetting  $PayoutSetting
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'type' => 'required',
            'bank_name' => 'required',
            'account_title' => 'required',
            'account_number' => 'required',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try{
            $model = PayoutSetting::findOrFail($id);
            $model->user_slug = Auth::user()->slug;
            $model->type = $request->type;
            $model->bank = $request->bank_name;
            $model->account_title = $request->account_title;
            $model->account_number = $request->account_number;
            $model->save();
            
            DB::commit();
            return redirect()->route('payoutsetting.edit', $model->id)->with('message', 'You have updated account details successfully. !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayoutSetting  $PayoutSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = PayoutSetting::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
