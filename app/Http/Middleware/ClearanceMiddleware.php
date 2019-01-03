<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
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
        if (Auth::user()->hasPermissionTo('Administer')) {
            return $next($request);  // 管理员具备所有权限
        }

        // $request中获取路径相关方法
        // $path = $request->path();
        // $route = pathinfo($request->decodedPath(), PATHINFO_FILENAME);
        // $actionName = $request->route()->getActionName();
        $action = $request->route()->getAction();
        $routeName = $action['as'];
        $user = Auth::user();

        if (!empty($routeName)) {
            if (!Auth::user()->hasPermissionTo($routeName)) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
//
//        if ($request->is('posts/create')) // 文章发布权限
//        {
//            if (!Auth::users()->hasPermissionTo('Create Post')) {
//                abort('401');
//            } else {
//                return $next($request);
//            }
//        }
//
//        if ($request->is('posts/*/edit')) // 文章编辑权限
//        {
//            if (!Auth::users()->hasPermissionTo('Edit Post')) {
//                abort('401');
//            } else {
//                return $next($request);
//            }
//        }
//
//        if ($request->isMethod('Delete')) // 文章删除权限
//        {
//            if (!Auth::users()->hasPermissionTo('Delete Post')) {
//                abort('401');
//            } else {
//                return $next($request);
//            }
//        }

    }
}
