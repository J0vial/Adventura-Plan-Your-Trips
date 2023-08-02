<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trips extends Controller
{
    public function trip_plan(Request $request){
        $data = DB::table('districts')
        ->select('districts.name as disName','districts.id as disId')
        ->orderBy('disName','asc')
        ->get();
        
        return view('trip_planner',compact('data'));
    }
    
    public function spot(Request $request){
        
        $cids = $request->post('cid');
        $types = DB::table('districts')
        ->join('spots','districts.id','=','spots.districts_id')
        ->where('spots.districts_id',$cids)
        ->select('spots.id as spots_id','spots.name as spot_name')
        ->get();
        
        
        $html = '<option value="">-- Spots --</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->spots_id.'">'.$type->spot_name.'</option>';
            
        }
        printf($html);
        
        
    }
    public function transportType(Request $request){
        $cid = $request->post('cid');
        $fid = $request->post('fid');
        $types = DB::table('districts')
        ->join('transportations','districts.id','=','transportations.districts_id')
        ->where('transportations.spots_id',$cid)
        ->where('transportations.districts_id',$fid)
        ->select('transportations.id as transport_id','transportations.type as transport_type','transportations.transport_name as transport_name')
        ->get();
        
        $html = '<option value="">-- Trasnportations --</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->transport_id.'">'.$type->transport_name.' - '.$type->transport_type.'</option>';
            
        }
        
        printf($html);
        
        
    }
    public function hotel(Request $request){
        $cid = $request->post('cid');
        $types = DB::table('hotelrooms')
        ->join('hotels','hotels.id','=','hotelrooms.hotels_id')
        ->where('spots_id',$cid)
        ->select('hotels.id as hotel_id','Room type as room_type','hotels.name as hotel_name','hotelrooms.bed_type',
        'hotelrooms.cost',)
        ->get();
        
        $html = '<option value="">-- Hotels --</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->hotel_id.'">'.$type->hotel_name .' - '.$type->room_type.' - '.$type->bed_type.' - '.$type->cost.'</option>';
            
        }
        
        printf($html);
        
        
    }

}
