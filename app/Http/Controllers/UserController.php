<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(UserRequest $request): JsonResponse {
        $inputData = $request->all();
        $inputData['password'] = Hash::make($request->password);
        $user = User::create($inputData);
        return response()->json([
            'success'   => (bool)$user,
            'message'   => ($user) ? 'User created' : 'Something is wrong',
            'data'      => ($user) ?: []
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        $response = [
            'success'   => false,
            'message'   => 'User credentials are invalids',
            'data'      => []
        ];
        if ($user && Hash::check($request->password, $user->password)) {
            $response = [
                'success'   => true,
                'message'   => 'Login successfully',
                'data'      => $user
            ];
        }
        return response()->json($response);
    }
}
