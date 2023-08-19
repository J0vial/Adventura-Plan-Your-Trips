<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function loginAdmin(){
        return view("adminDashboard.index");
    }//

    public function package(){
        $package =DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->leftjoin('user_packages','user_packages.packages_id','=','packages.id')
            ->select('packages.*','spots.name as spotName','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid','user_packages.id as upid','user_packages.phonNum as pnum','user_packages.payment as pay')
            ->paginate(5);
        return view("adminDashboard.package",compact('package'));
    }//

    public function spots(){
        return view("adminDashboard.spots");
    }//

    public function hotel(){
        return view("adminDashboard.hotel");
    }//
}
