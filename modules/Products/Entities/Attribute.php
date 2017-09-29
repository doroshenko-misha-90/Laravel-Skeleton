<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function value()
    {
    	return $this->hasMany(AttributeValue::class);
    }
}
