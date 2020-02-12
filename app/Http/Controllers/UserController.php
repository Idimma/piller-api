<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AvatarRequest, LocationRequest, UserPhoneRequest, UserRegistrationRequest};
use App\Services\UserService;
use Illuminate\Support\Facades\{Hash, Validator};
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
        return $this->respondWithSuccess($user, 201);
    }

    /**
     * Upload User Avatar
     * @return JsonResponse
     */
    public function uploadAvatar(AvatarRequest $request)
    {
        $data = $request->validated();
        $image = $this->userService->avatarUpload($data);
        return $this->respondWithSuccess($image, 201);
    }

    /**
     * Update User firstname & Last Name
     * @return JsonResponse
     */
    public function updateName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = $this->userService->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name')
        ]);
        return $this->respondWithSuccess($user, 201);
    }

    /**
     * Update User Email
     * @return JsonResponse
     */
    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }

        $user = $this->userService->update([
            'email' => $request->get('email'),
        ]);
        return $this->respondWithSuccess($user, 201);
    }

    /**
     * Add Location to User
     * @return JsonResponse
     */
    public function addLocation(LocationRequest $request)
    {
        $data = $request->validated();
        $location = $this->userService->addLocation($data);
        return $this->respondWithSuccess($location, 201);
    }

    public function getLocations()
    {
        return $this->respondWithSuccess($this->userService->getLocations());
    }

    public function getProfileImage(string $url)
    {
        try {
            return response()->file(storage_path('app/public/avatar/' . $url));
        } catch (\Throwable $th) {
            //throw $th;
            return $this->respondWithError();
        }
    }
}
