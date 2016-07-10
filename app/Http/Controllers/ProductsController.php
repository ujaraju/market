<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Auth;
use Flash;
use App\Http\Requests\ProductRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;


class ProductsController extends Controller
{

    /**
    * Create new products controller instance.
    *
    * 
    */

    public function __construct(){
        $this->middleware('auth', ['only'=>'create', 'only'=>'edit']);
    }



    
	/**
    * List all products.
    *
    * 
    */
	public function index(){
		$products = Product::latest('published_at')->published()->get();
    	return view('products.index', compact('products'));
    }



	/**
    * Display the product with ID.
    *
    * 
    */
	public function show(Product $product){
    	return view('products.show', compact('product'));
    }




	/**
    * Create new product.
    *
    * 
    */
	public function create(){

        $categories = Category::lists('name','id');
    	return view('products.create', compact('categories'));
    }




	/**
    * Save new product.
    *
    * 
    */
	public function store(ProductRequest $request){

        $this->createProduct($request);

        Flash::success('A product has been created');

    	return redirect('dashboard');
    }




	/**
    * Edit product with ID.
    *
    * 
    */
	public function edit(Product $product){
		$categories = Category::lists('name','id');

        // make sure that the product can only be edited by the user who created it 
        if (  $product->user_id == Auth::user()->id ){ 
            return view('products.edit', compact('product','categories'));
        }
        else{
            return redirect('dashboard');
        }
    }



    /**
    * Update product with ID.
    *
    * 
    */
    public function update(Product $product, ProductRequest $request){
        $product->update($request->all());
        $this->syncCategories($product, $request->input('category_list'));
        return redirect('dashboard');
    }








    /**
    * Sync categories in the database .
    *
    * 
    */
    private function syncCategories(Product $product, array $categories){
        $product->categories()->sync($categories);
    }



    /**
    * create new product .
    *
    * 
    */
    private function createProduct(ProductRequest $request){
        $product = Auth::user()->products()->create($request->all());
        $this->syncCategories($product, $request->input('category_list'));
        return $product;
    }

}
