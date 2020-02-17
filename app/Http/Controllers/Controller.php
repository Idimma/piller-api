<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return JSON Response
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public function jsonResponse(array $data, $code = 200): JsonResponse
    {
        return response()->json(array_merge($data, ['status_code' => $code]), $code);
    }

    /**
     * Some operation (save only?) has completed successfully
     * @param mixed $data
     * @return mixed
     */
    public function respondWithSuccess($data, $code = 200)
    {
        return $this->jsonResponse(is_array($data) ? $data : ['data' => $data], $code);
    }

    /**
     * Respond with an Error
     * @param string $data
     * @param int $code
     * @return JsonResponse
     */
    public function respondWithError($data = 'There was an error', $code = 400)
    {
        return $this->jsonResponse(is_array($data) ? $data : ['error' => $data], $code);
    }


    public function formatResponse($response){
        
    }
}
