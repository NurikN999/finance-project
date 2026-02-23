<?php

namespace App\Http\Resources\Api\V1\Card;

use App\Http\Resources\Api\V1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'bin' => $this->bin,
            'amount' => $this->amount,
            'user' => new UserResource($this->user)
        ];
    }
}
