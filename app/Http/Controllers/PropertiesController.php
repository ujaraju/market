<?php

namespace App\Http\Controllers;

use App\Property;
use App\Category;
use App\Image;
use Auth;
use App\User;
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
    * List all properties in map view.
    *
    * 
    */
    public function map(){
        $properties = Property::latest('published_at')->published()->get();

        $image_url = array();
        foreach($properties as $property) {
            $image_url[] = $property->images->first()->url;
        }
        //dd($images); // to see the contents
        return view('properties.map', compact('properties','image_url'));
    }


	/**
    * Display the property with ID.
    *
    * 
    */
	public function show(Property $property){
        $user = User::findOrFail( $property->user_id);        
    	return view('properties.show', compact('property','user'));
    }



	/**
    * Create new property.
    *
    * 
    */
	public function create(){
        //$user = Auth::user(); 
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
        //$user = Auth::user();
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
        $this->uploadImages($property, $request->file('images'));//TODO makelike asset mgmt in wordpress
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
    // private function syncImages(Property $property, array $images){
    //     $property->images()->sync($images);
    // }


    /**
    * create new property .
    *
    * 
    */
    private function createProperty(PropertyRequest $request){
        $property = Auth::user()->properties()->create($request->all());
        $this->syncCategories($property, $request->input('category_list'));
        $this->uploadImages($property, $request->file('images'));
        return $property;
    }

    /**
    * upload images in property .
    *
    * 
    */
    private function uploadImages(Property $property, array $images){
        /*  TAKE CARE OF THE IMAGES upload and assign to the property */
            //$images = $request->file('images');
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();            
                //create a new filename sha1 version and date just incase of conflict 
                $name = date('Y-m-d').'-'.sha1($image->getClientOriginalName()).'.'.$ext;
                
                $url = ('uploads/properties/' . $name);
                $url_thumbnail= ('uploads/properties/thumbnail/' . $name);
                $url_small= ('uploads/properties/small/' . $name);   
                $url_medium = ('uploads/properties/medium/' . $name);        
                
                $move = Img::make($image->getRealPath())->save($url);

                $move = Img::make($image->getRealPath())->fit(200, 100)->save($url_thumbnail);
                $move = Img::make($image->getRealPath())->fit(400, 200,function($constraint){$constraint->aspectRatio();})->save($url_small);
                $move = Img::make($image->getRealPath())->fit(940, 480,function($constraint){$constraint->aspectRatio();})->save($url_medium);
                //after the images uploaded, add them to the database 
                if ($move) {
                    $images = Image::create([
                        'url' => url($url),
                        'name' => $name,
                    ]);
                    //link the images to the property image pivot table
                    $property->images()->detach([$images->id]); //detach any other images for update scenario
                    $property->images()->attach([$images->id]); // attach new images
                }
            }
        /*  TAKE CARE OF THE IMAGES upload and assign to the property  */
    }




}