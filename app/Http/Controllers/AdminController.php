<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\{UserService, TripService};
use Tymon\JWTAuth\Facades\JWTAuth;




class AdminController extends Controller
{
    //
    public function __construct(UserService $userService, TripService $trip)
    {
        $this->userService = $userService;
        $this->tripService = $trip;
    }

    /**
     * 
     * User Registration
     * @return JsonResponse
     */
    public function register(UserRegistrationRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->register($data, 1);
        $token = JWTAuth::fromUser($user);
        return $this->respondWithSuccess(['data' => compact('user', 'token')], 201);
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->userService->authenticate($credentials);
        if (is_array($token)) {
            return $this->respondWithError(['error' => $token['error'], $token['status']]);
        }

        $user = JWTAuth::user();
        if ($user->userrole->role_id !== 1) {
            return $this->respondWithError(['error' => 'Not Authorised', 401]);
        }

        return $this->respondWithSuccess(['data' => compact('token')], 201);
    }


    public function createDriver(UserRegistrationRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->createDriver($data);
        return $this->respondWithSuccess(['data' => compact('user')], 201);
    }

    public function getTrips()
    {
        return $this->respondWithSuccess($this->tripService->getAllRequests());
    }

    public function getTripRequests(Request $request)
    {
        $per_page = $request->get('perPage');
        return $this->respondWithSuccess($this->tripService->getTripByStatus(2, $per_page));
    }

    /**
     * Gets Single Trip Infomation
     * @return JsonResponse
     */
    public function getSingleTrip(int $id)
    {
        return $this->respondWithSuccess($this->tripService->getTrip($id));
    }


    public function assignDriver(int $id, Request $request)
    {
        $uuid = $request->only('driver');
        return $this->respondWithSuccess($this->tripService->assignDriver($id, $uuid));
    }
}
