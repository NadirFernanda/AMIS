<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    protected array $supported = ['pt', 'en', 'fr'];

    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale', 'pt'));
        if (!in_array($locale, $this->supported)) {
            $locale = 'pt';
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
