<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Property extends Model
{
	protected $fillable = [
        'title',
        'description',
        'price',
        'published_at',
        'address',
        'lat',
        'lng',

            //facts
        'plot_area',
        'size_area',
        'built_year',
        'levels',


            //features
        'bed',
        'bath',
        'kitchen',
        'garage',
        'floor',
        'use',

            //additional features
        'additional_features',

            //utilities
        'utilities',

            //around the property
        'around_property'
    ];


    /**
     * Additional fields  to treat as carbon instances.
     *
     * 
     */
    protected $dates = ['published_at'];


    /**
     * Scope queries to propertys that have been published.
     *
     * 
     */
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }


    /**
     * Set published_at attribute.
     *
     * 
     */
    public function setPublishedAttribute($date){
        $this->attributes['published_at']= Carbon::parse($date);
    }


    /**
     * A property is owned by the user.
     *
     * 
     */
    public function users(){
        return $this->belongsTo('App\User');
    }


    /**
     * A property may belong to many categories.
     *
     * 
     */
	public function categories() {
	  return $this->belongsToMany('App\Category')->withTimestamps();
	}


    /**
     * Get list of the cat associated to the current property
     *
     * 
     */
    public function getCategoryListAttribute() {
        return $this->categories->lists('id')->all();
    }


    /**
     * A property may have many images.
     *
     * 
     */
    public function images() {
      return $this->belongsToMany('App\Image','image_property');
    }

    /**
     * Get list of the images associated to the current property
     *
     * 
     */
    public function getImageListAttribute() {
        return $this->images->lists('id')->all();
    }

}
