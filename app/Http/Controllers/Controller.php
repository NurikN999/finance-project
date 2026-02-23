<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

abstract class Controller
{
    public function successResponse(?string $message, array|JsonResource $data = [], int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function paginateResponse(
        ?string $message,
        array|JsonResource $data = [],
        int $status = 200,
        $perPage = 10,
        $total = null,
        $nextPage = null,
        $prevPage = null,
        $pages = null
    )
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'per_page' => $perPage,
            'total' => $total,
            'nextPage' => $nextPage,
            'prevPage' => $prevPage,
            'last_page' => $pages
        ], $status);
    }

    public function errorResponse(?string $message, int $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
