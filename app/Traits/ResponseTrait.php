<?php

declare(strict_types=1);

namespace App\Traits;

trait ResponseTrait
{
    public function sendResponse($result, $message = null)
    {
    	$response = [
            'success' => true,
            'result'  => $result,
        ];

        if($message){
            $response['message'] = $message;
        }

        return response()->json($response, 200);
    }

    public function sendError($errorMessages, $code = 500)
    {
    	$response = [
            'success' => false,
            'errors' => $errorMessages,
        ];

        return response()->json($response, $code);
    }
}

