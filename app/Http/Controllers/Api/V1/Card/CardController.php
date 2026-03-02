<?php

namespace App\Http\Controllers\Api\V1\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Card\CreateCardRequest;
use App\Http\Resources\Api\V1\Card\CardResource;
use App\Models\User;
use App\Services\Api\V1\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __construct(
        private CardService $cardService
    ) {}

    // Returns all cards
    public function index(Request $request)
    {
        $cards = $this->cardService->getAllCards($request->input('per_page'));

        return $this->paginateResponse(
            message: 'Карты получены успешно',
            data: CardResource::collection($cards),
            status: 200,
            perPage: $request->input('per_page'),
            total: $cards->total(),
            nextPage: $cards->nextPageUrl(),
            prevPage: $cards->previousPageUrl(),
            pages: $cards->lastPage(),
        );
    }

    public function getUserCard(User $user)
    {
        $cards = $this->cardService->getUserCard($user);

        return $this->successResponse(
            message: 'Карты пользователя получены успешно',
            data: CardResource::collection($cards),
        );
    }

    public function store(CreateCardRequest $request)
    {
        $card = $this->cardService->save($request->validated());

        return $this->successResponse(
            message: 'Карта была создана успешно',
            data: new CardResource($card),
            status: 201,
        );
    }
}
