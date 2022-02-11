<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $downloads = Download::orderBy('id','desc')->when($request->title,function($query) use($request){
            $query->where('title','like','%'.$request->title.'%');
        })->paginate(20);
        return view('admin.download.index', compact('downloads'));
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
        return view('admin.download.create',compact('categories'));
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
            'category_id' => 'required|numeric|exists:categories,id',
            'filename' => 'required|mimes:pdf|max:2048',
            'date' => 'required|date',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $file = $request->file('filename');
            $name = time().$file->getClientOriginalName();
            $filename = asset('/download-files/').'/'.$name;
            $file->move(public_path().'/download-files/',$name);
            $download = new Download();
            $download->title = $request->title;
            $download->category_id = $request->category_id;
            $download->date = $request->date;
            $download->filename = $name;
            $download->file_path = $filename;
            $download->category_id = $request->category_id;
            $download->save();
            'App\Helper\Helper'::addToLog("New download: {$download->title}");
            return redirect()->route('admin.download.index')->with('success','New Download added successfully');
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
        $download = Download::find($id);
        $categories = Category::get();
        return view('admin.download.edit',compact('download','categories'));
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
            'filename' => 'nullable|mimes:pdf|max:2048',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $download = Download::find($id);
            $download->title = $request->title;
            if($request->has('filename')){
                $file = $request->file('filename');
                $name = time().$file->getClientOriginalName();
                $filename = asset('/download-files/').'/'.$name;
                $file->move(public_path().'/download-files/',$name);
                $download->filename = $name;
                $download->file_path = $filename;
                $download->category_id = $request->category_id;
            }
            $download->save();
            'App\Helper\Helper'::addToLog("Updated download: {$download->title}");
            return redirect()->route('admin.download.index')->with('success','Download updated successfully');
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
            $download = Download::find($id);
            $download->delete();
            'App\Helper\Helper'::addToLog("Deleted download: {$download->title}");
            return redirect()->route('admin.download.index')->with('success','download deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function publish($id){
        try{
            $download = Download::find($id);
            $download->is_active = 1;
            $download->save();
            'App\Helper\Helper'::addToLog("Published download: {$download->title}");
            return redirect()->route('admin.download.index')->with('success','download published successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function unpublish($id){
        try{
            $download = Download::find($id);
            $download->is_active = 0;
            $download->save();
            'App\Helper\Helper'::addToLog("Published download: {$download->title}");
            return redirect()->route('admin.download.index')->with('success','download unpublished');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
