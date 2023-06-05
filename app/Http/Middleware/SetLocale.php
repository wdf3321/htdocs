<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale');

        if ($locale !== null && in_array($locale, ['en', 'zh-tw'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
