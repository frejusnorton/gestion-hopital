<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'redirect' => route('home')
            ]);
        }

        return response()->json([
            'errors' => [
                'identifiants' => ["Nom d'utilisateur ou mot de passe incorrects."],
            ]
        ], 422);
    }
}
