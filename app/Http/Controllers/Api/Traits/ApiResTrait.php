<?php

namespace App\Http\Controllers\Api\Traits;

trait ApiResTrait
{
    public function apiResponse($success, $message, $data, $status = 200)
    {
        return response()->json([
            'success'       => $success,
            'message'       => $message,
            'data'          => $data,
        ], $status);
    }
}