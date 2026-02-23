<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function save(array $data): User
    {
        $data['joined_at'] = now();
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function getAllUsers($perPage = 10)
    {
        return User::paginate($perPage);
    }
}
