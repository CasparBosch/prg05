<?php


namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class invalidUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ((Carbon::now()->timestamp - auth()->user()->created_at->timestamp) <= 84000) {
            abort(403, 'Your account is younger than 1 day, please wait 24 hours after creation.');

        }
        return $next($request);
    }
}
