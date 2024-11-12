<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Credenciales invalidas'], 401);
        }
        $user = Auth::guard('api')->user();
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
