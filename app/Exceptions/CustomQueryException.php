<?php

namespace App\Exceptions;

use Exception;

class CustomQueryException extends Exception
{
    /**
     * Custom message for the exception.
     *
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message = "Custom query exception occurred", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 500);
    }
}
