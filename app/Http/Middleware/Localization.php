<?php
// Copyright
declare(strict_types=1);

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('appLocale')) {
            App::setlocale(Session::get('appLocale'));
        } else {
            App::setlocale(Session::get('appLocale', 'ar'));
        }

        return $next($request);
    }
}
