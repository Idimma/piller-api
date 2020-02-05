<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\UserService;
use Tymon\JWTAuth\Facades\JWTAuth;




class AdminController extends Controller
{
    //
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
        if (is_array($token))
        {
            return $this->respondWithError(['error' => $token['error'], $token['status']]);
        }

        $user = JWTAuth::user();
        if ($user->userrole->role_id !== 1){
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
  
}
