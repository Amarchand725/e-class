<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageSetting;
use Session;
use Auth;

class PageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = PageSetting::where('parent_slug', $request->parent_slug)->first();
        if(empty($model)){
            foreach($request->all() as $key=>$value){
                $obj = $value;
                
                if(gettype($obj)!='array' && gettype($obj)!='string' && !empty($obj)){
                    $file = $obj;
                    $image = date('dmYHis').'.'.$file->getClientOriginalExtension();
                    $file->move('public/admin/assets/images/page', $image);
                    $obj = $image;
                }

                PageSetting::create([
                    'parent_slug' => $request->parent_slug,
                    'key' => $key,
                    'value' => isset($obj)?$obj:null,
                ]);
            }
            Session::flash('message', 'Setting added successfully!');
            return redirect()->back();
        }else{
            foreach($request->all() as $key=>$value){
                $page = PageSetting::where('parent_slug', $request->parent_slug)->where('key', $key)->first();
                
                $obj = $value;
                if(!empty($page)){
                    if(gettype($obj)!='array' && gettype($obj)!='string' && !empty($obj)){
                        $file = $obj;
                        $image = date('dmYHis').'.'.$file->getClientOriginalExtension();
                        $file->move('public/admin/assets/images/page', $image);
                        $obj = $image;
                    }

                    $page->value = $obj;
                    $page->update();
                }else{
                    if(gettype($obj)!='array' && gettype($obj)!='string' && !empty($obj)){
                        $file = $obj;
                        $image = date('dmYHis').'.'.$file->getClientOriginalExtension();
                        $file->move('public/admin/assets/images/page', $image);
                        $obj = $image;
                    }

                    PageSetting::create([
                        'parent_slug' => $request->parent_slug,
                        'key' => $key,
                        'value' => isset($obj)?$obj:null,
                    ]); 
                }
            }
            Session::flash('message', 'Setting updated successfully!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page_title = ucfirst($slug).' - Setting';
        $model = Page::where('slug', $slug)->first(); 
        $page_settings = PageSetting::where('parent_slug', $slug)->get(['key', 'value']);
        $page_data = [];
        foreach ($page_settings as $key => $page_setting) {
            $page_data[$page_setting->key] = $page_setting->value;
        }

        if($slug=='home'){
            return View('admin.page_setting.home', compact("model", "page_data", "page_title"));
        }elseif($slug=='about'){
            return View('admin.page_setting.about', compact("model", "page_data", "page_title"));
        }elseif($slug=='service'){
            return View('admin.page_setting.service', compact("model", "page_data", "page_title"));
        }elseif($slug=='contact'){
            return View('admin.page_setting.contact', compact("model", "page_data", "page_title"));
        }elseif($slug=='header'){
            return view('admin.page_setting.header', compact("model", "page_data", "page_title"));
        }elseif($slug=='footer'){
            return view('admin.page_setting.footer', compact("model", "page_data", "page_title"));
        }else{
            return redirect()->back()->with('error', 'Your page is missing.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
