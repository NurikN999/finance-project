<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\CreateUserRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use App\Services\Api\V1\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function index(Request $request)
    {
        $users = $this->userService->getAllUsers($request->input('per_page'));

        return $this->paginateResponse(
            message: 'Пользователи получены успешно',
            data: UserResource::collection($users),
            perPage: $request->input('per_page'),
            total: $users->total(),
            nextPage: $users->nextPageUrl(),
            prevPage: $users->previousPageUrl(),
            pages: $users->lastPage(),
        );
    }

    public function show(User $user)
    {
        return $this->successResponse(
            message: 'Пользователь получен успешно',
            data: new UserResource($user),
        );
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->save($request->validated());

        return $this->successResponse(
            message: 'Пользователь был создан успешно',
            data: new UserResource($user),
            status: 201
        );
    }
}
