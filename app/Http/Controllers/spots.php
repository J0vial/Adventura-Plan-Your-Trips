<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Spots extends Controller
{
    public function spot_page(Request $request){
        
        $search = $request['search'] ?? ""; // check null search or what
        $count_result = array();
        $spots = 0;
        if ($search != "" ){
            
            $spots = DB::table('spots')
            ->join('districts','spots.districts_id','=','districts.id')
            ->select('spots.*','districts.name as disName')
            ->where('spots.name','LIKE','%'.$search.'%')
            ->orWhere('districts.name','LIKE','%'.$search.'%')
            ->paginate(7);

            $count_result = DB::table('spots')
            ->join('districts','spots.districts_id','=','districts.id')
            ->where('spots.name','LIKE','%'.$search.'%')
            ->orWhere('districts.name','LIKE','%'.$search.'%')
            ->count();
            
            
        }else{
            $spots = DB::table('spots')
            ->join('districts','spots.districts_id','=','districts.id')
            ->select('spots.*','districts.name as disName')
            ->paginate(7);
        }
        return view("spots",compact('spots','search','count_result'));
    }

    public  function spot_pop($id){
        
        $data = DB::table('spots')
        ->join('districts','spots.districts_id','=','districts.id')
        ->leftjoin('transportations','spots.id','=','transportations.spots_id')
        ->where('spots.id','=',$id)
        ->select('spots.*','districts.name as disName','transportations.type as transport_type','transportations.transport_name as transportName',DB::raw('GROUP_CONCAT(transportations.transport_name) as  transports'))
        ->groupBy('spots.name','spots.id','spots.description','spots.pictures','spots.longitude and latitude','spots.districts_id','districts.name','transportations.type','transportations.transport_name')
        ->get();
        
                
        
        return response()->json($data);

        
    }




}