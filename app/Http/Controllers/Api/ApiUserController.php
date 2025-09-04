<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    // User Registation Api--------------

    public function register(UserCreateRequest $request){

        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            return response()->json(['message' => 'User already exists'], 409);
        }

        $user = User::create($validated);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    // User Login Api------------------
    public function login(ApiLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token'   => $token,
            // 'user'    => $user
            'status' => true
        ], 200);
    }

    // User Logout Function
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }


}
