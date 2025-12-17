<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // SIGNUP
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            // If request expects JSON, return JSON, else redirect
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Account created successfully',
                'user' => $user
            ], 201);
        }

        return redirect()->route('login')->with('success', 'Account created successfully.');
    }

    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        if (!Auth::attempt($credentials)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid credentials'
                ], 401);
            }
            return back()->withErrors([
                'email' => 'Invalid credentials.'
            ]);
        }

        $request->session()->regenerate();
        $user = Auth::user();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Logged in successfully',
                'user' => $user
            ]);
        }

        return redirect()->intended('dashboard');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Logged out successfully'
            ]);
        }

        return redirect('/login');
    }
}
