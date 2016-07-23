<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable= [
        'path'
    ];

    /**
     * An Image is owned by a product.
     *
     * 
     */
    public function products(){
        return $this->belongsTo('App\Product','image_product');
    }


}
