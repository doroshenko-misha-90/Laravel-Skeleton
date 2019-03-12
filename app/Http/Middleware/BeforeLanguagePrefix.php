<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;

class BeforeLanguagePrefix
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!app()->runningInConsole()) {
            $languages = Language::getAllViaCache();
            $langPrefixes = $languages->pluck('id', 'slug');

            // Get language from url or headers
            $segment = request()->header('Language');
            $segment = $segment ? $segment : $request->segment(1);

            $defaultLanguage = $languages->where('is_default', '=', 1)->first();
            if (isset($segment) && isset($langPrefixes[$segment])) {
                if ($segment === $defaultLanguage->slug && !request()->ajax()) {
                    return redirect(
                        mb_substr($request->server->get('REQUEST_URI'), 3),
                        301
                    );
                }

                $currentLanguage = $languages->where('slug', '=', $segment)->first();
                $langId = $currentLanguage->id;
                $locale = $currentLanguage->slug;
            } else {
                $langId = $defaultLanguage->id;
                $locale = $defaultLanguage->slug;
            }

            // Set current locale
            app()->setLocale($locale);
            config()->set('current_language_id', $langId);
        }

        return $next($request);
    }
}
