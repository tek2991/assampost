<?php

namespace App\Http\Controllers\Admin;

use App\Models\Office;
use App\Models\District;
use App\Models\Division;
use App\Models\OtherOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OtherOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $otherOffices = OtherOffice::paginate(10);
        return view('admin.other_office.index', compact('otherOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $offices = Office::get();
        $districts = District::all();
        $divisions = Division::all();
        return view('admin.other_office.create', compact('offices', 'districts', 'divisions'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:250',
            'office_id' => 'required | numeric | exists:offices,id',
            'division_id' => 'required | exists:divisions,id',
            'district_id' => 'required | exists:districts,id',
            'address_line1' => 'required',
            'pincode' => 'required | numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {

            $office = new OtherOffice();
            $office->office_id = $request->office_id;
            $office->division_id = $request->division_id;
            $office->district_id = $request->district_id;
            $office->latitude_longitude = $request->latitude_longitude;
            $office->pincode = $request->pincode;
            $office->title = $request->title;
            $office->address_line1 = $request->address_line1;
            $office->address_line2 = $request->address_line2;
            $office->phone_no = $request->phone_no;
            $office->email = $request->email;
            $office->website = $request->website;
            $office->other_description = $request->other_description;
            $office->is_active = $request->is_active;
            $office->save();
            'App\Helper\Helper'::addToLog("Created Other Office: {$office->title}");
            return redirect()->route('admin.other-office.index')->with('success', 'Office added successfully');
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
        $office = OtherOffice::find($id);
        $offices = Office::get();
        $districts = District::all();
        $divisions = Division::all();
        return view('admin.other_office.edit', compact('office', 'offices', 'districts', 'divisions'));
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
        $office = OtherOffice::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:250',
            'office_id' => 'required | numeric',
            'division_id' => 'required | exists:divisions,id',
            'district_id' => 'required | exists:districts,id',
            'address_line1' => 'required',
            'pincode' => 'required | numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $office->office_id = $request->office_id;
            $office->division_id = $request->division_id;
            $office->district_id = $request->district_id;
            $office->latitude_longitude = $request->latitude_longitude;
            $office->pincode = $request->pincode;
            $office->title = $request->title;
            $office->address_line1 = $request->address_line1;
            $office->address_line2 = $request->address_line2;
            $office->phone_no = $request->phone_no;
            $office->email = $request->email;
            $office->website = $request->website;
            $office->other_description = $request->other_description;
            $office->save();
            'App\Helper\Helper'::addToLog("Updated Other Office: {$office->title}");
            return redirect()->route('admin.other-office.index')->with('success', 'Office updated successfully');
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
        //
        $otherOffice = OtherOffice::find($id);
        try {
            $otherOffice->delete();
            'App\Helper\Helper'::addToLog("Deleted Other Office: {$otherOffice->title}");
            return redirect()->route('admin.other-office.index')->with('success', 'Office deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
