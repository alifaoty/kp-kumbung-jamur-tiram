<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function successResponse(
        mixed $data = null,
        string $message = 'Berhasil',
        int $statusCode = 200
    ): JsonResponse {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }

    protected function errorResponse(
        string $message = 'Terjadi kesalahan',
        mixed $errors = null,
        int $statusCode = 400
    ): JsonResponse {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'errors'  => $errors,
        ], $statusCode);
    }

    protected function createdResponse(
        mixed $data = null,
        string $message = 'Data berhasil disimpan'
    ): JsonResponse {
        return $this->successResponse($data, $message, 201);
    }

    protected function notFoundResponse(
        string $message = 'Data tidak ditemukan'
    ): JsonResponse {
        return $this->errorResponse($message, null, 404);
    }
}