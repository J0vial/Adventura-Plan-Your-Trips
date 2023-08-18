<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class hotels extends Controller
{
    public function hotel_page(Request $request){
        
        $search = $request['search'] ?? ""; // check null search or what
        $count_result = array();
        $hotels = 0;
        if ($search != "" ){
            
            $hotels = DB::table('hotels')
            ->join('districts','districts.id','=','hotels.districts_id')
            ->join('spots','spots.id','=','hotels.spots_id')
            ->join('hotelrooms','hotelrooms.hotels_id','=','hotels.id')
            ->select('spots.name as spotName','districts.name as disName','hotels.*','hotels.longitude and latitude as lgla','hotelrooms.room_no as rno','hotelrooms.Room type as roomType','hotelrooms.bed_type as betype','hotelrooms.cost as cost')
            ->where('hotels.name','LIKE','%'.$search.'%')
            ->orwhere('hotelrooms.bed_type','LIKE','%'.$search.'%')
            ->orwhere('hotelrooms.cost','LIKE','%'.$search.'%')
            ->paginate(7);

            $count_result = DB::table('hotels')
            ->join('districts','districts.id','=','hotels.districts_id')
            ->join('spots','spots.id','=','hotels.spots_id')
            ->leftJoin('hotelrooms','hotelrooms.hotels_id','=','hotels.id')
            ->where('hotels.name','LIKE','%'.$search.'%')
            ->orwhere('hotelrooms.bed_type','LIKE','%'.$search.'%')
            ->orwhere('hotelrooms.cost','LIKE','%'.$search.'%')
            ->count();
            
        }else{
            $hotels = DB::table('hotels')
            ->join('districts','districts.id','=','hotels.districts_id')
            ->join('spots','spots.id','=','hotels.spots_id')
            ->join('hotelrooms','hotelrooms.hotels_id','=','hotels.id')
            ->select('spots.name as spotName','districts.name as disName','hotels.*','hotels.longitude and latitude as lgla','hotelrooms.room_no as rno','hotelrooms.Room type as roomType','hotelrooms.bed_type as betype','hotelrooms.cost as cost')
            ->paginate(7);
        }
        return view("hotel",compact('hotels','search','count_result'));
    }

    public  function map_pop($id){
    
        $data = DB::table('hotels')
        ->where('id','=',$id)
        ->select('hotels.longitude and latitude as lgla')
        ->get();
        
                
        
        return response()->json($data);

        
    }
    public  function view_comment_hotel($id){
        
        
        $data = DB::table('usersreviews')
        ->join('users','users.id','=','usersreviews.users_id')
        ->where('hotels_id','=',$id)
        ->select('hotel_review','users.name as uname', 'usersreviews.created_at as time_difference')
        ->get();
        

        return response()->json($data);
       
    }
    public  function add_comment_hotel(Request $request){
        $mytime = Carbon::now()->timezone('Asia/Dhaka');
        $uid = $request->post('uid');
        $sid = $request->post('sid');
        $message = $request->post('message');
        
       $data = DB::table('usersreviews')
       ->insert(['users_id'=>$uid,'hotels_id' =>$sid,'hotel_review'=>$message,'created_at'=>$mytime]);
       if($data){


            return redirect('hotels');
       }

        
        

        
    }
    

    




}