<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function store(Request $request)
    {
        Log::info($request);
        $user = User::query()->create($request->only('name', 'email', 'password'));
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('dashBoard');
    }
}

