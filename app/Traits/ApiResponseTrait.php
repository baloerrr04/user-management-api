<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseTrait
{

    protected function successResponse(
        $data = null, 
        string $message = 'Success', 
        int $statusCode = Response::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    protected function errorResponse(
        string $message = 'Error', 
        int $statusCode = Response::HTTP_BAD_REQUEST, 
        $errors = null
    ): JsonResponse {
        $responseData = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors) {
            $responseData['errors'] = $errors;
        }

        return response()->json($responseData, $statusCode);
    }
}