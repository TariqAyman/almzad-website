<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;

class PhoneVerifyMiddleware
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
        if (auth('user')->check()) {

            $user = auth('user')->user();

            if (!$user->phone_verified) {
                return redirect()->route('frontend.verifyPhone');
            }

            return $next($request);
        }

        return $next($request);
    }
}
