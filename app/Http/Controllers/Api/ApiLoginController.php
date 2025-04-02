<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::whereEmail($credentials['email'])
            ->first();

        if ($user === null && !Hash::check($credentials['password'], $user->password)) {
            return response()->json('Unauthorized', 401);
        };

        $token = $user->createToken('token');

        return response()->json($token->plainTextToken);
    }
}
