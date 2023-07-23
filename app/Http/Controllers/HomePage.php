<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePage extends Controller
{
    public function imageAndDescription(){
        $data = DB::table('spots')->select('pictures','description')->get();
        return view('homePage',compact('data'));
    }
}
