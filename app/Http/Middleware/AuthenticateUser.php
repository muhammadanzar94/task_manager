<?php

namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthenticateUser {
    public function handle(Request $request, Closure $next) {
        try {
            if (!auth('sanctum')->check()) {
                return response()->json(['success' => false, 'message' => "Login token expired!", 'status' => 401]);
            }

            $user = auth('sanctum')->user();
            if ($request->method() == 'GET') {
                $request->merge(['user' => $user]);
            } else {
                $request->merge(['data' => array_merge($request->get('data'), ['user' => $user])]);
            }
        } catch (\Exception $ex) {
        }

        return $next($request);
    }
}
