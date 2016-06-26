<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only'=>'about']);
    }
    //home page
     public function home(){
        return view('pages.home');
     }

     public function about(){
        return view('pages.about');
     }
     
     public function contact(){
        return view('pages.contact');
     }

}
