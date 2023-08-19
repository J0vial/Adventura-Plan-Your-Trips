<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function loginAdmin(){

        $user = DB::table('users')
        ->get();
        return view("adminDashboard.index",compact('user'));
    }//

    public function delete_user($id){

        $user = DB::table('users')
        ->where('id','=',$id )
        ->delete();
        if($user){
            return redirect('adminDashboard')->with('deleted','Data has been deleted');
        }
    }//


    public function update_user(Request $request){
        $id = $request->email;
        $name = $request->name;
        $num = $request->num;
        $adress = $request->adress;
        
        $user = DB::table('users')
        ->where('id','=',$id )
        ->update(['name'=>$name,'phone_num'=>$num,'adress'=>$adress]);
        if($user ){
            return redirect('adminDashboard')->with('update','Data has been deleted');
        }


    }




    public function package(){
        $package =DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->leftjoin('user_packages','user_packages.packages_id','=','packages.id')
            ->select('packages.*','spots.name as spotName','spots.id as spotId','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid','user_packages.id as upid','user_packages.phonNum as pnum','user_packages.payment as pay')
            ->paginate(5);
        $hotel = DB::table('hotels')
        ->get();
        $spot= DB::table('spots')
        ->get();
        $transport= DB::table('transportations')
        ->join('spots','spots.id','=','transportations.spots_id')
        ->join('districts','districts.id','=','transportations.districts_id')
        ->select('transportations.*','districts.name as disName','spots.name as spotName' )
        ->get();
        
        
        return view("adminDashboard.package",compact('package','hotel','spot','transport'));
    }//

    public function destroy_package($id){
        
        $data = DB::table('packages')
        ->where('id','=',$id )
        ->delete();
        
        if($data){
            return redirect('adminPackage')->with('deleted','Data has been deleted');
        }
    }

    public function add_package(Request $request){
        $hotel = $request->hotel;
        $spot = $request->spot;
        $trans = $request->trans;
        $stay = $request->stay;
        $price= $request->price;
        $data = DB::table('packages')
        ->insert(['spots_id'=>$spot,'hotels_id'=>$hotel,'transportations_id'=>$trans,'staying'=>$stay,'price'=>$price]);
        
        
        if($data){
            return redirect('adminPackage')->with('add','Data has been ADDED');
        }
    }



    public function spots(){
        return view("adminDashboard.spots");
    }//

    public function hotel(){
        return view("adminDashboard.hotel");
    }//
}
