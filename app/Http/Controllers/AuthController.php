<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash; // secure our passwords
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function loginUser(Request $request){
        $request->validate([
            
            'email'=>'required|email',
            'pass'=>'required|min:6|max:12'

        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user){
            if (Hash::check($request->pass, $user->pass)){

                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');

            }else{
                return back()->with('fail','Password not match or do not have any email');
            }

        }else{
            return back()->with('fail','This email not found');

        }
    }


    
    public function register(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){

        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone_num'=>'required|min:11',
            'pass'=>'required|min:6|max:12'

        ]);

        
        $saved = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_num' => $request->phone_num,
            'adress' =>  $request->adress,
            'pass' => Hash::make(($request->pass)),
            'user_type' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),                
        ]);
        
        if($saved){

            return redirect('login')->with('success','You have been registered!');

        }else{

            return back()->with('fail','Something Wrong!');

        }

    }

    public function dashboard(){

        $data = array();
        if (Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }


    public function logout(){

        if (Session::has('loginId')){

            Session::pull('loginId');
            
            return redirect('/');

        }
    }
}

