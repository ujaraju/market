<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
	protected $fillable = [
        'title',
        'description',
        'price',
        'published_at',
        'user_id',//temporary
    ];


    /**
     * Additional fields  to treat as carbon instances.
     *
     * 
     */
    protected $dates = ['published_at'];


    /**
     * Scope queries to products that have been published.
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
     * A product is owned by the user.
     *
     * 
     */
    public function users(){
        return $this->belongsTo('App\User');
    }


	public function categories() {
	  return $this->belongsToMany('App\Category')->withTimestamps();
	}


    /**
     * Get list of the cat associated to the current product
     *
     * 
     */
    public function getCategoryListAttribute() {
        return $this->categories->lists('id')->all();
    }


}
