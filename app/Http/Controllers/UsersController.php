<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Property;
use App\Category;
use Flash;
use Image as Img;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function dashboard()
    {
        $user = Auth::user(); 
        $properties = $user->properties()->latest('published_at')->published()->get();
        return view('users.dashboard',compact('user','properties'));
    }

    /**
    * Show user profile. ||just a concept so far|| 
    *
    * 
    */
	public function show($id){
		$user = User::findOrFail($id);
        $properties = $user->properties()->latest('published_at')->published()->get();
        return view('users.show',compact('user','properties'));
    }



    /**
    * Edit user with ID.
    *
    * 
    */
    public function edit($id){
        if ( Auth::user() == User::findOrFail($id) ) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        }else{
            return redirect('dashboard');
        }
    }


    /**
    * Update user.
    *
    * 
    *
    */

    public function update(UserRequest $request){
        
            $user = Auth::user();

            $avatar = $request->file('avatar');
            if( $avatar != ''){
                $filename = $user->id."-".(str_replace(" ","-", $user->name)).'.'.$avatar->getClientOriginalExtension();
                Img::make($avatar)->resize(75, 75)->save( public_path('/uploads/avatars/' . $filename ) );
                $user->avatar = $filename;
            }
            
            $user->password = bcrypt($request->input('password'));
            $user->phone = $request->input('phone');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            
            $user->save();

            //$user->update($request->all());

            return redirect('dashboard');
        
    }

    // public function update(UserRequest $request){

    //     // Handle the user upload of avatar
    //     if($request->hasFile('avatar')){
    //         $avatar = $request->file('avatar');
    //         $filename = time() . '.' . $avatar->getClientOriginalExtension();
    //         Image::make($avatar)->resize(300, 300)->save( '/uploads/avatars/' . $filename);

    //         $user = Auth::user();
    //         $user->avatar = $filename;
    //         $user->save();
    //     }

    //     return redirect('dashboard');

    // }




}
