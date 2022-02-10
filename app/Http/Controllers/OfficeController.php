<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'search' => 'nullable|string',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
        ]);

        $query = Office::query();
        if($request->filled('search') ){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        if($request->filled('division_id')){
            $query->where('division_id', $request->division_id);
        }
        if($request->filled('district_id')){
            $query->where('district_id', $request->district_id);
        }
        $offices = $query->paginate(10);
        $districts = District::all();
        $divisions = Division::all();
        return view('administrative-office', compact('offices', 'districts', 'divisions', 'request'));
    }
}
