<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable= [
        'url',
        'name'
    ];

    /**
     * An Image is owned by a product.
     *
     * 
     */
    public function products(){
        return $this->belongsTo('App\Property','image_property');
    }


}
