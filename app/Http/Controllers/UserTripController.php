<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Services\TripService;
use Illuminate\Http\Request;


class UserTripController extends Controller
{
    //
    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function createTrip(TripRequest $request)
    {
        $data = $request->validated();
        $response = $this->tripService->requestTrip($data);
        return $this->respondWithSuccess($response, 201);
    }
}
