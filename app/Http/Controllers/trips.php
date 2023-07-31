<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trips extends Controller
{
    public function trip_plan(Request $request){
        $data = DB::table('spots')
        ->join('districts','spots.districts_id','=','districts.id')
        ->select('spots.*','districts.name as disName')
        ->orderBy('disName')
        ->get();
        
        return view('trip_planner',compact('data'));
    }
    public function transportType(Request $request){
        $cid = $request->post('cid');
        $types = DB::table('transportations')
        ->join('spots','transportations.spots_id','=','spots.id')
        ->where('spots.id',$cid)
        ->select('transportations.id as transportation_id', 'transportations.type')
        ->get();
        
        
        $html = '<option value="">--transportation type--</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->transportation_id.'">'.$type->type.'</option>';
            
        }
        printf($html);
        
        
    }

}
