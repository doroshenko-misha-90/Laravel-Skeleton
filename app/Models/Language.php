<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    protected $fillable = [
        'title',
        'slug',
    ];

    public static function getAllViaCache()
    {
        return Cache::rememberForever('languages', function () {
            return Language::get();
        });
    }

    public static function getPrefixes()
    {
        return Language::getAllViaCache()->pluck('id', 'slug')->toArray();
    }
}
