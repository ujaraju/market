<?php

namespace App\Http\Controllers;

use App\Property;
use App\Category;
use App\Image;
use Auth;
use Flash;
use App\Http\Requests\PropertyRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

use Image as Img;
class PropertiesController extends Controller
{

    /**
    * Create new properties controller instance.
    *
    * 
    */

    public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }



    
	/**
    * List all properties.
    *
    * 
    */
	public function index(){
		$properties = Property::latest('published_at')->published()->get();
    	return view('properties.index', compact('properties'));
    }



	/**
    * Display the property with ID.
    *
    * 
    */
	public function show(Property $property){
    	return view('properties.show', compact('property'));
    }



	/**
    * Create new property.
    *
    * 
    */
	public function create(){
        $categories = Category::lists('name','id');
    	return view('properties.create', compact('categories'));
    }




	/**
    * Save new property.
    *
    * 
    */
	public function store(PropertyRequest $request){

        $this->createProperty($request);

        Flash::success('A property has been created');

    	return redirect('dashboard');
    }



	/**
    * Edit property with ID.
    *
    * 
    */
	public function edit(Property $property){
		$categories = Category::lists('name','id');
        // make sure that the property can only be edited by the user who created it 
        if (  $property->user_id == Auth::user()->id ){ 
            return view('properties.edit', compact('property','categories'));
        }
        else{
            return redirect('dashboard');
        }
    }



    /**
    * Update property with ID.
    *
    * 
    */
    public function update(Property $property, PropertyRequest $request){
        $property->update($request->all());
        $this->syncCategories($property, $request->input('category_list'));
        return redirect('dashboard');
    }





    /**
    * Sync categories in the database .
    *
    * 
    */
    private function syncCategories(Property $property, array $categories){
        $property->categories()->sync($categories);
    }


    /**
    * Sync images in the database.//For later
    *
    * 
    */
    private function syncImages(Property $property, array $images){
        $property->images()->sync($images);
    }


    /**
    * create new property .
    *
    * 
    */
    private function createProperty(PropertyRequest $request){
        $property = Auth::user()->properties()->create($request->all());



        /*  TAKE CARE OF THE IMAGES upload and assign to the property */
        $images = $request->file('images');
        foreach ($images as $image) {

            $ext = $image->getClientOriginalExtension();            
            //create a new filename sha1 version and date just incase of conflict 
            $filename = date('Y-m-d').'-'.sha1($image->getClientOriginalName()).'.'.$ext;
            
            $path = ('uploads/properties/' . $filename);
            $pathSmall = ('uploads/properties/small/' . $filename);        

            $move = Img::make($image->getRealPath())
                    ->resize(null, 400,function($constraint){$constraint->aspectRatio();})->save($path);

            $move = Img::make($image->getRealPath())
                    ->resize(767, 400,function($constraint){$constraint->aspectRatio();})->save($pathSmall);




            //after the images uploaded, add them to the database 
            if ($move) {
                $images = Image::create([
                    'path' => url($path),
                ]);
                //link the images to the property image pivot table
                $property->images()->attach([$images->id]);
            }
        }
        /*  TAKE CARE OF THE IMAGES upload and assign to the property  */




        $this->syncCategories($property, $request->input('category_list'));

        return $property;
    }




    // public function upload(){
    // //This code will run after saving instance of property class,because we need to create the property id first.
    //     $files = Input::file('images');
    //             foreach($files as $file) {
    //             $picture = new Picture;
    //             $extension = $file->getClientOriginalExtension();
    //                          //Creating sha1 version of the filename in case of conflicts
    //             $sha1 = sha1($file->getClientOriginalName());
    //             $filename=date('Y-m-d-h-i-s').".".$sha1.".".$extension;
    //             $path = public_path('img/properties/' . $filename);
    //                         // Using Intervention/image package here to resize the pictures
    //             Image::make($file->getRealPath())->resize(468, 249)->save($path);
                
    //             $picture->path='img/properties/' . $filename;

    //             $picture->save();

    //             $property->picture()->attach($picture->id);

    //             }
    // }


}