<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AvatarRequest, UserPhoneRequest, UserRegistrationRequest};
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\{JWTException, TokenExpiredException, TokenInvalidException};

class UserController extends Controller
{
    //
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }



    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->userService->authenticate($credentials);
        if (is_array($token)) {
            return $this->respondWithError(['error' => $token['error'], $token['status']]);
        }

        return $this->respondWithSuccess(['data' => compact('token')], 201);
    }


    /**
     * 
     * User Registration
     * @return JsonResponse
     */
    public function register(UserRegistrationRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->get('password'));
        $user = $this->userService->register($data);
        $token = JWTAuth::fromUser($user);
        return $this->respondWithSuccess(['data' => compact('user', 'token')], 201);
    }


    /**
     * Gets Authenticated User
     * @return JsonResponse
     */
    public function getAuthenticatedUser()
    {
        if (!$user = getUser()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }

        return $this->respondWithSuccess($user);
    }



    /**
     * 
     * Update the User phone number
     * @return JsonResponse
     */

    public function addPhone(UserPhoneRequest $request)
    {
        $request = $request->validated();
        $user = $this->userService->update(['phone' => $request['phone']]);
        return $this->respondWithSuccess($user);
    }

    public function uploadAvatar(AvatarRequest $request)
    {
        $data = $request->validated();
        $image = $this->userService->avatarUpload($data);
        return $this->respondWithSuccess($image);
    }
}
