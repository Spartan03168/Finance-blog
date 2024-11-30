<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Admin_class_middleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
            }

        return redirect()->route('blog.index')->with('error', 'Access Denied: Admins Only');
        }
}
