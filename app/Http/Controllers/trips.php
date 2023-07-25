<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trips extends Controller
{
    public function trip_plan(){
        
        return view('trip_planner');
    }
}
