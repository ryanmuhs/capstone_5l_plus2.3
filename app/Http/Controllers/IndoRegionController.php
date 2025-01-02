<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// Indonesia
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

// Get semua data

class IndoRegionController extends Controller
{
    public function form(){
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        dd($districts);
    }
}
