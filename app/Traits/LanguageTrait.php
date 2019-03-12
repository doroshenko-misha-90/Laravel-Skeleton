<?php

namespace App\Traits;

use App\Models\Language;

trait LanguageTrait
{
    public static function getPrefix()
    {
        $segment = request()->segment(1);
        if (isset($segment) && isset(Language::getPrefixes()[$segment])) {
            return $segment;
        }

        return null;
    }
}