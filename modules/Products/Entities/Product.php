<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'img', 'slug', 'price', 'status'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}