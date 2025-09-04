<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HospitalRequest;
use App\Models\Hospital;

class HospitalController extends Controller
{


    // index hospital page
    public function index(){

        return view('hospital.index');
        
    }






    // create hospital
    public function store(HospitalRequest $request)
    {
        $hospital = Hospital::create($request->validated());
        return response()->json($hospital, 201);

        // --- STORE --- //


    }
}
