<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    use ResponseTrait;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

            return $this->sendResponse(['token' => $token], 'Login Successfull');
        }

        return $this->sendError('Credentials do not matched !');
    }

    public function logout(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Revoke the user's current token
        $request->user()->token()->revoke();

        return $this->sendResponse('Successfully logged out.');
    }
}
