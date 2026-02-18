<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $this->successResponse(
            message: 'Пользователи получены успешно',
            data: UserResource::collection($users),
        );
    }

    public function show(User $user)
    {
        return $this->successResponse(
            message: 'Пользователь получен успешно',
            data: new UserResource($user),
        );
    }

    public function store(Request $request)
    {
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'joined_at' => now()
        ]);

        return $this->successResponse(
            message: 'Пользователь был создан успешно',
            data: [],
            status: 201
        );
    }
}
