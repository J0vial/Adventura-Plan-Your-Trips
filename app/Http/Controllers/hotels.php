<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
            ->select('spots.name as spotName','districts.name as disName','hotels.*','hotelrooms.room_no as rno','hotelrooms.Room type as roomType','hotelrooms.bed_type as betype','hotelrooms.cost as cost')
            ->where('hotels.name','LIKE','%'.$search.'%')
            ->paginate(7);

            $count_result = DB::table('hotels')
            ->join('districts','districts.id','=','spots.districts_id')
            ->join('spots','spots.id','=','hotels.spots_id')
            ->leftJoin('hotelrooms','hotelrooms.hotels_id','=','hotels.id')
            ->where('hotels.name','LIKE','%'.$search.'%')
            ->count();
            
        }else{
            $hotels = DB::table('hotels')
            ->join('districts','districts.id','=','hotels.districts_id')
            ->join('spots','spots.id','=','hotels.spots_id')
            ->join('hotelrooms','hotelrooms.hotels_id','=','hotels.id')
            ->select('spots.name as spotName','districts.name as disName','hotels.*','hotelrooms.room_no as rno','hotelrooms.Room type as roomType','hotelrooms.bed_type as betype','hotelrooms.cost as cost')
            ->paginate(7);
        }
        return view("hotel",compact('hotels','search','count_result'));
    }

    




}