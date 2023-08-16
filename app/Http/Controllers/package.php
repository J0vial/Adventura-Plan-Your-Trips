<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class package extends Controller
{
    public function packages(Request $request){
        $search = $request['search'] ?? ""; // check null search or what
        $count_result = array();
        $package = 0;
        
        if ($search != "" ){
            $package =DB::table('packages')
            ->join('spots','spots.id','=','packages.spots_id')
            ->join('hotels','hotels.id','=','packages.hotels_id')
            ->join('transportations','transportations.id','=','packages.transportations_id')
            ->leftjoin('user_packages','user_packages.packages_id','=','packages.id')
            ->select('packages.*','spots.name as spotName','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid','user_packages.id as upid','user_packages.phonNum as pnum')
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
            ->select('packages.*','spots.name as spotName','hotels.name as hotelName','transportations.transport_name as transport_name','user_packages.packages_id as Pid','user_packages.users_id as uid','user_packages.id as upid','user_packages.phonNum as pnum')
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

    public function payment($id){      
        return view('payment',compact('id'));
        
        
    }
    public function transaction(Request $request){ 
        $request->validate([

            'num'=>'required',
            'transaction'=>'required',
            'id'=>'required',
            

        ]); 
        $id= $request->id; 
        
        $saved = DB::table('user_packages')
        ->where('id',$id)
        ->update([
            'phonNum' => $request->num,
            'transactionId' => $request->transaction,          
        ]);
        if ($saved) {
         return redirect('package')->with('done','Submitted the payment info');
        }
        
    }
}
