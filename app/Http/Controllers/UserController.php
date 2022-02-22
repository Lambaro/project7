<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller

{
    // Upload new avatar
    public function uploadAvatar(Request $request){

        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message','Image Uploaded');
        }
          return redirect()->back()->with('error','Image not Uploaded');

    }


    public function index(){

        $data = [
            'name' => 'luna',
            'email' => 'luna@test.com',
            'password' => 'password',
        ];
        //User::create($data);
        $user = User::all(); // show all data from sql
        return $user;


       // return view('home');
    }
}
