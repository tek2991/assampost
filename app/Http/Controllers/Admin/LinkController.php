<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;
use Validator;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $links = Link::orderBy('id','desc')->when($request->title,function($query) use($request){
            $query->where('title','like','%'.$request->title.'%');
        })->paginate(20);
        return view('admin.link.index', compact('links'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('admin.link.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:250',
            'url' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $link = new Link();
            $link->title = $request->title;
            $link->url = $request->url;
            $link->category_id = $request->category_id;
            $link->save();
            'App\Helper\Helper'::addToLog("New Link: {$link->title}");
            return redirect()->route('admin.link.index')->with('success','New Link added successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::get();
        $link = Link::find($id);
        return view('admin.link.edit',compact('link','categories'));

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
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:250',
            'url' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $link = Link::find($id);
            $link->title = $request->title;
            $link->url = $request->url;
            $link->category_id = $request->category_id;
            $link->save();
            'App\Helper\Helper'::addToLog("Updated link: {$link->title}");
            return redirect()->route('admin.link.index')->with('success','Link updated successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
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
        try{
            $link = Link::find($id);
            $link->delete();
            'App\Helper\Helper'::addToLog("Deleted link: {$link->title}");
            return redirect()->route('admin.link.index')->with('success','Link deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function publish($id){
        try{
            $link = Link::find($id);
            $link->is_active = 1;
            $link->save();
            'App\Helper\Helper'::addToLog("Published link section: {$link->title}");
            return redirect()->route('admin.link.index')->with('success','Link published successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function unpublish($id){
        try{
            $link = Link::find($id);
            $link->is_active = 0;
            $link->save();
            'App\Helper\Helper'::addToLog("Published link section: {$link->title}");
            return redirect()->route('admin.link.index')->with('success','Link unpublished');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
