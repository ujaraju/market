<?php

namespace App\Http\Controllers;
use App\Category;

//use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

	/**
    * Display category with ID.
    *
    * 
    */
	public function show($id){
		$category = Category::findOrFail($id);
    	return view('categories.show', compact('category'));
    }

}
