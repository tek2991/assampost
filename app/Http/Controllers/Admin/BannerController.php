<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add-banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $validator = Validator::make($request->all(), [
            'banner_image' => 'required | image | mimes:jpeg,png,jpg | max:2048',
             'url'=>'nullable | url|regex:'.$regex,
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $file = $request->file('banner_image');
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('banner_image'));
            if(substr_count($request->file('banner_image'), '.') > 1){
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            if($mime_type != "image/png" && $mime_type != "image/jpeg")
            {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            if($extension != "jpg" && $extension != "jpeg" && $extension != "png")
            {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            if(!filter_var($request->url, FILTER_VALIDATE_URL)){
                return redirect()->back()->with('error', 'Invalid URL');
            }
            // $destinationPath = storage_path( 'app/public/banner_image' );
            // $file = $request->banner_image;
            // $fileName = time() . '.'.$file->getClientOriginalExtension();
            // $file->move( $destinationPath.''. $fileName );
            $banner = Banner::create([
                'banner_image' => $request->banner_image,
                'url' => $request->url,
                'is_active' => '1',
            ]);


            $fileName = time().'.'.$request->banner_image->getClientOriginalExtension();
            Request()->file('banner_image')->move(public_path('uploads/' . $banner->id), $fileName);
            $banner_image_path = asset('uploads/' . $banner->id) . '/' . $fileName;

            $banner->update([
                'banner_image' => $banner_image_path,
            ]);

            'App\Helper\Helper'::addToLog("Banner Image Added");
            return redirect()->route('admin.banner.create')->with('status', 'Banner Image added successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('admin.banner.edit', compact('banners'));
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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $validator = Validator::make($request->all(), [
            'banner_image' => 'nullable | image | mimes:jpeg,png,jpg | max:2048',
            'url'=>'nullable | url|regex:'.$regex,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        try {
            $banner = Banner::find($id);
            if($request->hasFile('banner_image')){
                $file = $request->file('banner_image');
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('banner_image'));
            if(substr_count($request->file('banner_image'), '.') > 1){
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            if($mime_type != "image/png" && $mime_type != "image/jpeg")
            {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            if($extension != "jpg" && $extension != "jpeg" && $extension != "png")
            {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            if(!filter_var($request->url, FILTER_VALIDATE_URL)){
                return redirect()->back()->with('error', 'Invalid URL');
            }
            $fileName = time().'.'.$request->banner_image->getClientOriginalExtension();
                Request()->file('banner_image')->move(public_path('uploads/' . $banner->id), $fileName);
                $banner_image_path = asset('uploads/' . $banner->id) . '/' . $fileName;
                $banner->update([
                    'banner_image' => $banner_image_path,
                    'url' => strip_tags($request->url)
                ]);
            }
            else{
                $banner->update([
                    'url' => $request->url
                ]);
            }
        
            'App\Helper\Helper'::addToLog("Banner Image Updated");
            return redirect()->route('admin.banner.index')->with('status', 'Banner Image updated successfully');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
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
        $banners = Banner::find($id);
        try {
            $banners->delete();
            'App\Helper\Helper'::addToLog("Deleted Office: Banner Image Deleted");
            return redirect()->route('admin.banner.index')->with('success', 'Banner Image deleted successfully');
        } catch (\Exception $e) {
            Log::error('BannerController@destroy :' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
