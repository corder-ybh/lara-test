<?php
/**
 * isAdmin中间件
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Auth\User;

class AdminMiddleware
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
        $user = User::all()->count();
        $action = $request->route()->getAction();

        if (!($user == 1)) {
            if (!Auth::user()->hasPermissionTo('Administer')) {
                abort('401');
            }
        }

        return $next($request);
    }
}
