<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOption\None;

class Spots extends Controller
{
    public function spot_page(Request $request){
        $boolean = false;
        $search = $request['search'] ?? ""; // check null search or what
        $spots = array();
        if ($search != "" ){
            
            $spots = DB::table('spots')->where('name','LIKE','%'.$search.'%')->orWhere('districtName','LIKE','%'.$search.'%')->get(); 
            $boolean = True;
            
        }else{

        }
        
        
        return view("spots",compact('spots','boolean'));
    }
}