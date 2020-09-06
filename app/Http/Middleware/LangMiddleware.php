<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LangMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('lang')) {
            $language = $request->session()->get('lang');
            App::setLocale($language);
        }

        return $next($request);
    }
}
