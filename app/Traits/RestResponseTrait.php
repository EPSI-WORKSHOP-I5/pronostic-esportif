<?php

namespace App\Traits;

trait RestResponseTrait
{

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse($payload, $statusCode = 200) {
        return response()->json($payload, $statusCode);
    }

    protected function successResponse() {
        return $this->jsonResponse(['success' => 'success']);
    }

    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequestResponse($message = 'Bad request', $statusCode = 400) {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }

    protected function internalErrorResponse($message = 'Internal error', $statusCode = 500) {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }
}