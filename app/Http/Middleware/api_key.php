<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class api_key
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        $api_key = 'nonteknis';

        if ($header != 'kitamudaindonesia') {
            return response()->json([
                'status' => 401,
                'message' => 'Authorization is Wrong!'
            ]);
        } else {
            return $next($request);
        }
    }
}
