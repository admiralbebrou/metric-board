<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Неверный email или пароль'
            ], 401);
        }

        $token = $user->createToken('auth_token', ['*'], Carbon::now()->addMinutes(120))->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $bearer = $request->bearerToken();

        if ($bearer) {
            $token = PersonalAccessToken::findToken($bearer);
            if ($token) {
                $token->delete(); // удаляем из базы
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
