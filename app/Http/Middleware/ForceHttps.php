<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    
    public function handle($request, Closure $next)
    {
    //     if (\App::environment(['production']) && $_SERVER["HTTP_X_FORWARDED_PROTO"] != 'https') {
    //     return redirect()->secure($request->getRequestUri());
    // }
    //     return $next($request);
    // }
    
     if (env('APP_ENV') === 'production') {
            $request->server->set('HTTPS', 'on');
            if ($request->header('x-forwarded-proto') <> 'https') {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
