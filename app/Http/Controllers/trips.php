<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trips extends Controller
{
    public function trip_plan(Request $request){
        $data = DB::table('spots')
        ->orderBy('districtName')
        ->get();
        
        return view('trip_planner',compact('data'));
    }
    public function transportType(Request $request){
        $cid = $request->post('cid');
        $types = DB::table('transportations')
        ->join('spots','transportations.spots_id','=','spots.id')
        ->where('spots.id',$cid)
        ->get();
        $types_grp = $types->groupBy('transportations.types');
        
        $html = '<option value="">--transportation type--</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->spots_id.'">'.$type->type.'</option>';
            echo $html;
        }
    }

}
