<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WithAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        if (!session()->get("logged", false)) {
            return redirect()->route("login")->withErrors([
                "msg" => "Mohon login terlebih dahulu"
            ]);
        }
        return $next($request);
    }
}
