<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login the user
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // check if the user exists
        $user = User::where('email', $request->email)->first();

        // if the user doesn't exist
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Create token for the user which expires in a week.
        $token = $user->createToken(name: 'auth_token', expiresAt: now()->addWeek())->plainTextToken;

        // Return the token.
        return response()->json([
            'token' => $token
        ]);
    }

    /**
     * Logout the user
     * @param Request $request The HTTP Request.
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        // revoke the token
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated user
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
