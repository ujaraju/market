<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image;
use Auth;
use Flash;
use App\Http\Requests\ProductRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Image as Img;

class ProductsController extends Controller
{

    /**
    * Create new products controller instance.
    *
    * 
    */

    public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'edit']]);
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
    * Sync images in the database.//For later
    *
    * 
    */
    private function syncImages(Product $product, array $images){
        $product->images()->sync($images);
    }


    /**
    * create new product .
    *
    * 
    */
    private function createProduct(ProductRequest $request){
        $product = Auth::user()->products()->create($request->all());



        /*  TAKE CARE OF THE IMAGES upload and assign to the product */
        $images = $request->file('images');
        foreach ($images as $image) {
            
            $ext = $image->getClientOriginalExtension();
            
            //create a new filename sha1 version and date just incase of conflict 
            $filename = date('Y-m-d').'-'.sha1($image->getClientOriginalName()).'.'.$ext;
            $path = ('uploads/' . $filename);        

            $move = Img::make($image->getRealPath())->resize(468, 249)->save($path);

            //$move = $image->move('uploads', $image->getClientoriginalName());

            //after the images uploaded, add them to the database 
            if ($move) {
                $images = Image::create([
                    'path' => '/'.$path,
                ]);
                //link the images to the product image pivot table
                $product->images()->attach([$images->id]);
            }
        }
        /*  TAKE CARE OF THE IMAGES upload and assign to the product  */




        $this->syncCategories($product, $request->input('category_list'));

        return $product;
    }




    // public function upload(){
    // //This code will run after saving instance of Product class,because we need to create the product id first.
    //     $files = Input::file('images');
    //             foreach($files as $file) {
    //             $picture = new Picture;
    //             $extension = $file->getClientOriginalExtension();
    //                          //Creating sha1 version of the filename in case of conflicts
    //             $sha1 = sha1($file->getClientOriginalName());
    //             $filename=date('Y-m-d-h-i-s').".".$sha1.".".$extension;
    //             $path = public_path('img/products/' . $filename);
    //                         // Using Intervention/image package here to resize the pictures
    //             Image::make($file->getRealPath())->resize(468, 249)->save($path);
                
    //             $picture->path='img/products/' . $filename;

    //             $picture->save();

    //             $product->picture()->attach($picture->id);

    //             }
    // }


}
