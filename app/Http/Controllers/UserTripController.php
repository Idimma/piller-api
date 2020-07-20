<?php

namespace App\Http\Controllers;

use App\Http\Requests\{TripRequest,TripReviewRequest};
use App\Services\PlanService;
use Illuminate\Http\Request;


class UserTripController extends Controller
{
    private $tripService;
    //
    public function __construct(PlanService $tripService)
    {
        $this->tripService = $tripService;
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function createTrip(TripRequest $request)
    {
        $data = $request->validated();
        if (getUser()->hasActiveTrip()){
            return $this->respondWithError('You have an active trip, please cancel that or complete');
        }
        $response = $this->tripService->requestTrip($data);
        return $this->respondWithSuccess($response, 201);
    }

    /**
     * Gets Only Authenticated User Trips data
     * @return JsonResponse
     */
    public function getUserTrips()
    {
        return $this->respondWithSuccess($this->tripService->userTrips());
    }

    /**
     * Get Latest Pending Trip
     * @return JsonResponse
     */
    public function getPendingTrip()
    {
        return $this->respondWithSuccess(getUser()->getPendingTrip());
    }

    /**
     * Cancel's user trips
     * @param Int $id
     * @return JsonResponse
     */
    public function cancelTrip(Int $id)
    {
        $trip = $this->tripService->cancelTrip($id);
        if (isset($trip['error'])){
            return $this->respondWithError($trip);
        }
        return $this->respondWithSuccess($trip);
    }

    public function reviewTrip(Int $id, TripReviewRequest $request)
    {
        $data = $request->validated();
        $trip = $this->tripService->setTripReview($id, $data);
        if (isset($trip['error'])){
            return $this->respondWithError($trip);
        }
        return $this->respondWithSuccess($trip);
    }

    public function trackTrip(int $id){
        return $this->respondWithSuccess($this->tripService->trackTrip($id));
    }
}
