<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class trips extends Controller
{
    public function trip_plan(Request $request){
        $data = DB::table('districts')
        ->select('districts.name as disName','districts.id as disId')
        ->orderBy('disName','asc')
        ->get();

        $plan_data = DB::table('plannings')
        ->where('users_id',Session::get('loginId'))
        ->count();

        $all_plan = DB::table('plannings')
        ->join('transportations','transportations.id','=','plannings.transportations_id')
        ->join('spots','spots.id','=','plannings.spots_id')
        ->join('districts','districts.id','=','plannings.districts_id')
        ->join('transportations as return_transportations', 'return_transportations.id', '=', DB::raw('plannings.return_trans'))
        ->select('districts.name as dis_name','spots.name as spot_name','transportations.type as transport_type','transportations.transport_name as transport_name','transportations.cost as tcost','hotel_info','dayStays','return_transportations.transport_name as return_transport_name','return_transportations.type as return_transport_type','return_transportations.cost as rtcost','plannings.id as plan_id' )
        ->where('users_id',Session::get('loginId'))
        ->paginate(5);

        
        
        return view('trip_planner',compact('data','plan_data','all_plan'));
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
        return $html;
        
        
    }
    public function transportType(Request $request){
        $curr_time = Carbon::now()->timezone('Asia/Dhaka');
        $cid = $request->post('cid');
        $fid = $request->post('fid');
        $types = DB::table('districts')
        ->join('transportations','districts.id','=','transportations.districts_id')
        ->where('transportations.spots_id',$cid)
        ->where('transportations.districts_id',$fid)
        ->where('transportations.date', '>', $curr_time)
        ->select('transportations.id as transport_id','transportations.type as transport_type','transportations.transport_name as transport_name','transportations.time as ttime','transportations.date as tdate')
        ->get();
        
        $html = '<option value="">-- Trasnportations --</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->transport_id.'">'.$type->transport_name.' - '.$type->transport_type.' - Time('.$type->ttime.') - '.$type->tdate.'</option>';
            
        }
        return $html;
        
        
        
    }
    public function hotel(Request $request){
        $cid = $request->post('cid');
        $types = DB::table('hotelrooms')
        ->join('hotels','hotels.id','=','hotelrooms.hotels_id')
        ->where('spots_id',$cid)
        ->where('hotelrooms.room_no', '>=', 1)
        ->select('hotels.id as hotel_id','Room type as room_type','hotels.name as hotel_name','hotelrooms.bed_type',
        'hotelrooms.cost')
        ->get();
        
        $html = '<option value="">-- Hotels --</option>';
        foreach($types as $type){
            $html.= '<option value="'.$type->hotel_name .' - '.$type->room_type.' - '.$type->bed_type.' - '.$type->cost.'">Name:'.$type->hotel_name .' - Room Type:'.$type->room_type.' - Bed Type:'.$type->bed_type.' - Price:'.$type->cost.'Taka </option>';
            
        }
        return $html;
        
        
        
    }
    public function saveData(Request $request){
        
        

        $user = Session::get('loginId');
        $place_id = $request->place;
        $spot_id = $request->spot;
        $hotel = $request->hotel;
        
        $num = (Carbon::parse(($request->date_picker1)))->diffInDays(Carbon::parse($request->date_picker2));
        $transp_id = $request->transp;
        $rtransp_id = $request->rtransp;

        
        
        if(!empty($spot_id) && !empty($transp_id) && !empty($rtransp_id)){
            $data = DB::table('plannings')
            ->insert(['users_id'=>$user,'transportations_id'=>$transp_id,'spots_id'=>$spot_id,'districts_id'=>$place_id,'hotel_info'=>$hotel,'return_trans'=>$rtransp_id,'dayStays'=>$num]);
            if($data){


                return redirect('trips')->with('saved','Your Planning has been saved');
            }

        }else{

            return back()->with('sorry','You cannot give go with unfilled');

        }
        
    }
    public function destroy(Request $request){
        $id = $request->post('cid');
        $data = DB::table('plannings')
        ->where('id','=',$id )
        ->delete();
        
        if($data){
            return redirect('trips')->with('deleted','Data has been deleted');
        }
    }
    
    public function tabledata(Request $request){
        
        $all_value = DB::table('plannings')
        ->get();
        
        
        return view('trip_planner', compact('all_value'));
    }
    
        



}
