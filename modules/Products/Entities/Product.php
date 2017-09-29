<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'img', 'slug', 'price', 'status'];

	public static $locale_status = [
		'available'    => 'В наличии',
		'stock'        => 'На складе',
		'unavailable'  => 'Нет в наличии',
		'discontinued' => 'Не производиться',
	];

	/**
	 * @return string
	 */
	public function getStatusLocaleAttribute()
	{
		if (array_key_exists($this->status,self::$locale_status)) {
			return self::$locale_status[$this->status];
		} return $this->status;
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function attributes()
	{
		return $this->belongsToMany(Attribute::class);
	}
}