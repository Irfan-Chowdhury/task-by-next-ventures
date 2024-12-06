<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
