<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!$request->user()) {
            return redirect('/auth/login');
        }
        
        $having = false;
        
        foreach(explode('|', $roles) as $role) {
            if ($request->user()->role == $role) {
                $having = true;
                break;
            }
        }
        
        if (!$having) {
            return redirect('/errors-403');    
        }
        
        return $next($request);
    }
}
