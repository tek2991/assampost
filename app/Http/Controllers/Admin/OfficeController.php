<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Office;
use Illuminate\Support\Facades\Log;
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offices = Office::paginate(10);
        return view('admin.office.index', compact('offices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        $divisions = Division::all();

        return view('admin.office.create', compact('districts', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required | max:250',
            'division_id' => 'required | exists:divisions,id',
            'district_id' => 'required | exists:districts,id',
            'address_line1' => 'required',
            'pincode' => 'required | numeric',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $office = new Office();
            $office->title = $request->title;
            $office->division_id = $request->division_id;
            $office->district_id = $request->district_id;
            $office->pincode = $request->pincode;
            $office->address_line1 = $request->address_line1;
            $office->address_line2 = $request->address_line2;
            $office->latitude = $request->latitude;
            $office->longitude = $request->longitude;
            $office->phone_no = $request->phone_no;
            $office->email = $request->email;
            $office->website = $request->website;
            $office->other_description = $request->other_description;
            $office->save();
            'App\Helper\Helper'::addToLog("Created Office: {$office->title}");
            return redirect()->route('admin.office.index')->with('success','Office created successfully');
        }
        catch(\Exception $e){
            Log::error('OfficeController@store: '.$e->getMessage());
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
        $office = Office::find($id);
        return view('admin.office.edit', compact('office'));
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
        $office = Office::find($id);
        $validator = Validator::make($request->all(),[
            'title'=>'required | max:250'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $office->title = $request->title;
            $office->address_line1 = $request->address_line1;
            $office->address_line2 = $request->address_line2;
            $office->phone_no = $request->phone_no;
            $office->email = $request->email;
            $office->website = $request->website;
            $office->other_description = $request->other_description;
            $office->save();
            'App\Helper\Helper'::addToLog("Updated Office: {$office->title}");
            return redirect()->route('admin.office.index')->with('success','Office updated successfully');
        }
        catch(\Exception $e){
            Log::error('OfficeController@update: '.$e->getMessage());
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
        $office = Office::find($id);
        try{
            $office->delete();
            'App\Helper\Helper'::addToLog("Deleted Office: {$office->title}");
            return redirect()->route('admin.office.index')->with('success','Office deleted successfully');
        }
        catch(\Exception $e){
            Log::error('OfficeController@destroy: '.$e->getMessage());
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
