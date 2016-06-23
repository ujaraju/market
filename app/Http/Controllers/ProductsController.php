<?php

namespace App\Http\Controllers;
use App\Product;

//use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    
	/**
    * List products.
    *
    * 
    */
	public function index(){
		//http://localhost/market/public/products
		$products = Product::latest('published_at')->published()->get();
    	return view('products.index', compact('products'));
    }



	/**
    * Display product with ID.
    *
    * 
    */
	public function show($id){
		$product = Product::findOrFail($id);
    	return view('products.show', compact('product'));
    }




	/**
    * Create new product.
    *
    * 
    */
	public function create(){
    	return view('products.create');
    }




	/**
    * Save new product.
    *
    * 
    */
	public function store(ProductRequest $request){
		//$input = Request::all();
		//$input['published_at'] = Carbon::now();
		//$input['user_id'] = 1;

		Product::create($request->all());
    	return redirect('products');
    }




	/**
    * Edit product with ID.
    *
    * 
    */
	public function edit($id){
		$product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    /**
    * Update product with ID.
    *
    * 
    */
    public function update($id, ProductRequest $request){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('products');
    }



}
