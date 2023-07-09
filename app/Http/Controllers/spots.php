<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Spots extends Controller
{
    public function spot_page(){
        return view("spots");
    }
}