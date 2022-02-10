<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use App\Models\Notice;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $notices = Notice::orderBy('id','desc')->when($request->title,function($query) use($request){
            $query->where('title','like','%'.$request->title.'%');
        })->paginate(20);
        return view('admin.notice.index', compact('notices'));
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
        return view('admin.notice.create',compact('categories'));
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
            'category_id' => 'required|numeric',
            'filename' => 'required|mimes:pdf|max:2048',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $file = $request->file('filename');
            $name = time().$file->getClientOriginalName();
            $filename = asset('/notice-files/').'/'.$name;
            $file->move(public_path().'/notice-files/',$name);
            $notice = new Notice();
            $notice->title = $request->title;
            $notice->category_id = $request->category_id;
            $notice->filename = $name;
            $notice->file_path = $filename;
            $notice->publish_to_scroll = $request->publish_to_scroll;
            $notice->save();
            'App\Helper\Helper'::addToLog("New notice: {$notice->title}");
            return redirect()->route('admin.notice.index')->with('success','Notice added successfully');
        }
        catch(\Exception $e){
            dd($e);
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
        $notice = Notice::find($id);
        return view('admin.notice.edit',compact('notice','categories'));
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
            'category_id' => 'required|numeric',
            'filename' => 'nullable|mimes:pdf|max:2048',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $notice = Notice::find($id);
            $notice->title = $request->title;
            if($request->has('filename')){
                $file = $request->file('filename');
                $name = time().$file->getClientOriginalName();
                $filename = asset('/notice-files/').'/'.$name;
                $file->move(public_path().'/notice-files/',$name);
                $notice->filename = $name;
                $notice->file_path = $filename;
            }
            $notice->category_id = $request->category_id;
            $notice->publish_to_scroll = $request->publish_to_scroll;
            $notice->save();
            'App\Helper\Helper'::addToLog("Updated notice: {$notice->title}");
            return redirect()->route('admin.notice.index')->with('success','Notice updated successfully');
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
            $notice = Notice::find($id);
            $notice->delete();
            'App\Helper\Helper'::addToLog("Deleted notice: {$notice->title}");
            return redirect()->route('admin.notice.index')->with('success','Notice deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function publish($id){
        try{
            $notice = Notice::find($id);
            $notice->is_active = 1;
            $notice->save();
            'App\Helper\Helper'::addToLog("Published notice: {$notice->title}");
            return redirect()->route('admin.notice.index')->with('success','Notice published successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function unpublish($id){
        try{
            $notice = Notice::find($id);
            $notice->is_active = 0;
            $notice->save();
            'App\Helper\Helper'::addToLog("Published notice: {$notice->title}");
            return redirect()->route('admin.notice.index')->with('success','Notice unpublished');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
