<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(Request $request){
        
        $offices = Office::paginate(10);
        $districts = District::all();
        $divisions = Division::all();
        return view('administrative-office', compact('offices', 'districts', 'divisions'));
    }
}
