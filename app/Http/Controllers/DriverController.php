<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\{UserService, TripService};
use Tymon\JWTAuth\Facades\JWTAuth;





class DriverController extends Controller
{
    //
    private $tripService, $userService;
    public function __construct(UserService $userService, TripService $tripService)
    {
        $this->userService = $userService;
        $this->tripService = $tripService;
    }

    /**
     * 
     * User Registration
     * @param UserRegistrationRequest $request
     * @return JsonResponse
     */
    public function register(UserRegistrationRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->register($data, 2);
        return $this->respondWithSuccess(['data' => compact('user')], 201);
    }

    /**
     * Authenticates User
     * @param Request $request
     * @return JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->userService->authenticate($credentials, 2);
        if (is_array($token)) {
            return $this->respondWithError(['error' => $token['error']], $token['status']);
        }
        return $this->respondWithSuccess(['data' => compact('token')], 201);
    }

    /**
     * Get Available Drivers List
     * @return JsonResponse
     */
    public function getAvailable()
    {
        return $this->respondWithSuccess($this->userService->getAvailableDrivers());
    }

    /**
     * Accepts assigned trip request
     * @param Trip $id
     * @return JsonResponse
     */
    public function acceptTrip(Int $id)
    {
        $trip = $this->tripService->acceptTrip($id);
        if (isset($trip['error'])) {
            return $this->respondWithError($trip);
        }
        return $this->respondWithSuccess($trip);
    }
}
