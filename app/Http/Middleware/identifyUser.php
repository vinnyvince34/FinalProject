<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class identifyUser
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
        $type = JWTAuth::parseToken()->getPayload()->get('type');
        $id = JWTAuth::parseToken()->getPayload()->get('sub');

        if (! $user = Auth::guard(lcfirst($type))->loginUsingId($id)) {
            return response()->json(['user_not_found'], 404);
        }

        Auth::setUser($user);
//        return $next($request);
    }
}
