<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use DB;

class RegistrationController extends Controller
{
    public function create(){

        $stop_register = DB::table('settings')->where('name', 'stop_register')->value('value');
    	return view('register',compact('stop_register'));


    }

    public function store(Request $request){

    	// Create User

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();

        // add role 

        $user->roles()->attach(Role::where('name','user')->first());

    	// login 

    	auth()->login($user);

    	// redirect

    	return redirect('/posts');



    }
}
