<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Customer;
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
        $request->validate(
            [
                'first_name'    => 'required|string',
                'last_name'     => 'required|string',
                'mobile_number' => 'required|string',
                'password'      => 'required|string',
            ]
        );

        $user = User::create(
            [
                'name'          => $request->first_name.' '.$request->last_name,
                'mobile_number' => $request->mobile_number,
                'password'      => Hash::make($request->password),
            ]
        );

        // create customer for the user
        $customer = $user->customer()->create(
            [
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
            ]
        );

        return response()->json(
            ['message' => 'Successfully created customer account!', 'status' => 'success',],
            201
        );

    }//end register()


    /**
     * Login the user
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate(
            [
                'mobile_number' => 'required|string',
                'password'      => 'required|string',
            ]
        );

        // check if the user exists
        $user = User::where('mobile_number', $request->mobile_number)->first();

        // if the user doesn't exist
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                ['message' => 'Invalid credentials'],
                401
            );
        }

        // Create token for the user which expires in a week.
        $token = $user->createToken(name: 'auth_token', expiresAt: now()->addWeek())->plainTextToken;

        // Return the token.
        return response()->json(
            ['token' => $token]
        );

    }//end login()


    /**
     * Logout the user
     *
     * @param  Request $request The HTTP Request.
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        // revoke the token
        $request->user()->tokens()->delete();

        return response()->json(
            ['message' => 'Successfully logged out']
        );

    }//end logout()


    /**
     * Get the authenticated user
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json(UserResource::make($request->user()));

    }//end user()


}//end class
