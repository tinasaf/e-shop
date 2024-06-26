<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if ($request->age && $request->age < 18) {
            return redirect('home')->with('error', 'Harus berumur 18 Tahun.');
        }

        return $next($request);
    }
}