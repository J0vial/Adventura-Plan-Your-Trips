<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
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


    public  function add_comment(Request $request){
        $mytime = Carbon::now()->timezone('Asia/Dhaka');
        $uid = $request->post('uid');
        $sid = $request->post('sid');
        $message = $request->post('message');
        
       $data = DB::table('usersreviews')
       ->insert(['users_id'=>$uid,'spots_id' =>$sid,'destination_review'=>$message,'created_at'=>$mytime]);
       if($data){


            return redirect('spots');
       }

        
        

        
    }
    
    public  function view_comment($id){
        
        
        $data = DB::table('usersreviews')
        ->join('users','users.id','=','usersreviews.users_id')
        ->where('spots_id','=',$id)
        ->select('destination_review','users.name as uname', 'usersreviews.created_at as time_difference')
        ->get();
        

        return response()->json($data);
       
    }

    


    

}