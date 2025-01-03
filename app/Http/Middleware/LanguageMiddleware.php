<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
// print_r($request);
        $language=session('language');
        // Session(key: 'language');
        // $language=session('language');
        echo $language;
        //set the current language
        app()->setLocale(locale: $language);
        return $next($request);
    }
}
