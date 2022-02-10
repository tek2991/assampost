<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\District;
use App\Models\Division;
use App\Models\OtherOffice;
use Illuminate\Http\Request;

class OtherOfficeController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'search' => 'nullable|string',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'office_id' => 'nullable|exists:offices,id',
        ]);

        $query = OtherOffice::query();
        if($request->filled('search') ){
            $query->where('title', 'like', '%'.$request->search.'%')->orWhere('address_line1', 'like', '%'.$request->search.'%')->orWhere('address_line2', 'like', '%'.$request->search.'%')->orWhere('pincode', 'like', '%'.$request->search.'%');
        }
        if($request->filled('division_id')){
            $query->where('division_id', $request->division_id);
        }
        if($request->filled('district_id')){
            $query->where('district_id', $request->district_id);
        }
        if($request->filled('office_id')){
            $query->where('office_id', $request->office_id);
        }
        $offices = $query->paginate(10);
        $districts = District::all();
        $divisions = Division::all();
        
        return view('other-office',compact('offices', 'districts', 'divisions', 'request'));
    }
}
