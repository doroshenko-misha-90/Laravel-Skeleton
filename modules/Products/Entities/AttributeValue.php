<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
	protected $fillable = ['attribute_id', 'product_id', 'value'];

	public $timestamps = false;

	public function attribute()
	{
		return $this->belongsTo(Attribute::class);
	}

	public function scopeWithProduct($query, $product_id)
	{
		return $query->where('product_id', $product_id);
	}
}
