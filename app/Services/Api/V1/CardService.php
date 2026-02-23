<?php

namespace App\Services\Api\V1;

use App\Models\Card;
use App\Models\User;

class CardService
{
    public function getAllCards($perPage = 10)
    {
        return Card::paginate($perPage);
    }

    public function getUserCard(User $user)
    {
        return Card::where('user_id', $user->id)->get();
    }

    public function save(array $data)
    {
        return Card::create($data);
    }
}
