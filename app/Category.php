<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//class Category extends Model
class Category extends Node
{
	protected $table = 'categories';
	public function products() {
	  return $this->belongsToMany('Product', 'product_category');
	}
}
