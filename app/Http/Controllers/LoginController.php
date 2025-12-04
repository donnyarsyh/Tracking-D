<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$this->authService->attemptLogin($credentials)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'redirect' => route('diabetes.page')
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'password');
        $result = $this->authService->register($data);

        return response()->json($result);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect('/');
    }
}
