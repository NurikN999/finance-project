<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->errorResponse(
                message: 'Не верные данные для авторизации',
                status: 401
            );
        }

        return $this->successResponse(
            message: 'Авторизация пройдена успешно',
            data: [
                'token' => $token,
                'type' => 'Bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
                'user' => new UserResource(Auth::user())
            ]
        );
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);
        $token = JWTAuth::fromUser($user);

        return $this->successResponse(
            message: 'Регистрация пройдена успешно',
            data: [
                'token' => $token,
                'type' => 'Bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]
        );
    }
}
