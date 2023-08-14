<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class package extends Controller
{
    public function package(Request $request){
        $search = $request['search'] ?? ""; // check null search or what
        $count_result = array();
        $package = 0;
        
        if ($search != "" ){
            $package =DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->leftjoin('user_packages','user_packages.packages_id','=','packages.id')
            ->select('packages.*','spots.name as spotName','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid')
            ->where('spots.name','LIKE','%'.$search.'%')
            ->paginate(5);
        
            $count_result = DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->where('spots.name','LIKE','%'.$search.'%')
            ->count();
        
        }
        else{
            $package =DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->leftjoin('user_packages','user_packages.packages_id','=','packages.id')
            ->select('packages.*','spots.name as spotName','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid')
            ->paginate(5);
        }
        
        
        
        return view("package",compact('search','count_result','package'));
        //
    }
    public function saveData($id){
        $user = Session::get('loginId');
        $data = DB::table('user_packages')
        ->insert(['users_id'=>$user,'packages_id'=>$id]);
        if ($data){
            return redirect('package')->with('saved','Your Package has been saved');
        }
        
    }
}
