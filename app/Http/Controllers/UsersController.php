<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function show($id){
		$user = User::findOrFail($id);
		//if the user is in seller group  
    	return view('users.seller.show', compact('user'));
    }
}
