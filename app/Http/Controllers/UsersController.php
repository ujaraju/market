<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['only'=>'dashboard']);
    }

    /**
    * Show user profile. ||just a concept so far|| 
    *
    * 
    */
	public function show($id){
		$user = User::findOrFail($id);
    	return view('users.show', compact('user'));
    }



}
