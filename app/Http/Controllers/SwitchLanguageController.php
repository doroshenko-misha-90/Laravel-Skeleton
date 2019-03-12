<?php

namespace App\Http\Controllers;

use App\Models\Language;

class SwitchLanguageController extends Controller
{
    public function __invoke($lang)
    {
        $referer = redirect()->back()->getTargetUrl();
        $segments = explode('/', parse_url($referer, PHP_URL_PATH));

        if (isset(Language::getPrefixes()[$segments[1]])) {
            unset($segments[1]);
        }

        if ($lang != Language::getAllViaCache()->where('is_default', '=', 1)->first()->slug) {
            array_splice($segments, 1, 0, $lang);
        }

        $url = request()->root() . implode("/", $segments);
        if (parse_url($referer, PHP_URL_QUERY)) {
            $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
        }

        return redirect($url);
    }
}
