<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOption\None;
use PhpParser\Builder\Function_;

class Spots extends Controller
{
    public function spot_page(Request $request){
        
        $search = $request['search'] ?? ""; // check null search or what
        $count_result = array();
        $spots = 0;
        if ($search != "" ){
            
            $spots = DB::table('spots')->where('name','LIKE','%'.$search.'%')->orWhere('districtName','LIKE','%'.$search.'%')->paginate(7);

            $count_result = DB::table('spots')->where('name','LIKE','%'.$search.'%')->orWhere('districtName','LIKE','%'.$search.'%')->count();
            
        }else{
            $spots = DB::table('spots')->paginate(7);
        }
        return view("spots",compact('spots','search','count_result'));
    }

    public  function popUp($id){
        $datas = DB::table('spots')->get();
        $data_id = $datas->find($id);

        return response()->json($data_id);
    }




}