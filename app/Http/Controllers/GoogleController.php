<?php

namespace App\Http\Controllers;

use App\Models\Google;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function index(){

        return view('gmail');
    }

    function gsub(){
        // dd(3132);
       return Socialite::driver('google')->redirect();

    }


    function callback(){
        $user = Socialite::driver('google')->user();
        dd($user);
        // print_r($user);
      $name = $user->name;
      $email = $user->email;
      $gid = $user->id;

      if($user){
        // echo 'in';
        $add = User::create([
           'name' => $name,
           'email' => $email,
           'google_id' => $gid
        ]);
        if($add){
            echo 'login with gmail........';
        }else{
            echo 'not created';
        }
      }
      else{
         echo 'out';
      }
    }

}
