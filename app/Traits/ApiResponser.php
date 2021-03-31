<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    protected function successResponse($message, $code)
    {
        return response()->json(['message' => $message], $code);
    }

    protected function successResponseWithData($message, $data, $code)
    {
        $response = [
            'message' => $message,
            'data' => json_encode($data)
        ];
        return response()->json($response, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message], $code);
    }
}