<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 */
class ApiBaseController extends Controller
{
    /**
     * @param null $result
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccess($result = null, $code = 200)
    {
        $response = [
            'data' => $result,
        ];

        return response()->json($response, $code);
    }

    /**
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($code = 400)
    {
        $error = [
            'code' => $code,
        ];

        return response()->json($error, $code);
    }
}