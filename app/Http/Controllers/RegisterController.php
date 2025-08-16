<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::query()->create($validated);

        $token = $user->createToken('auth_token', ['*'], Carbon::now()->addMinutes(120))->plainTextToken;

        Auth::login($user);

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ]);
    }
}
