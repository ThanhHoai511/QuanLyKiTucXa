<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 1:
                    if (Auth::user()->is_access == 1) {
                        return redirect('admin');
                    }
                break;
            
            default:
                    if (Auth::user()->is_access == 0) {
                        return redirect('/');
                    }
                break;
        }

        return $next($request);
    }
}
