<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AvatarRequest, LocationRequest, UserPhoneRequest, UserRegistrationRequest, UserUpdateRequest};
use App\Services\{LocationService, SettingService, UserService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator};
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    //
    private $settings;

    public function __construct(UserService $userService, LocationService $location, SettingService $settings)
    {
        $this->userService = $userService;
        $this->locationService = $location;
        $this->settings = $settings;
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        $token = $this->userService->authenticate($credentials);
        if (is_array($token)) {
            return $this->respondWithError(['error' => $token['error']], $token['status']);
        }
        return $this->respondWithSuccess(['data' => compact('token')], 201);
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
     * @param UserPhoneRequest $request
     * @return JsonResponse
     */

    public function addPhone(UserPhoneRequest $request)
    {
        $request = $request->validated();
        $user = $this->userService->update(['phone' => $request['phone']]);
        return $this->respondWithSuccess($user, 201);
    }

//    public function update(UserUpdateRequest $request)
//    {
//        $request = $request->validated();
//        dd($request);
//        $user = $this->userService->update($request);
//        return $this->respondWithSuccess($user, 201);
//    }

    /**
     * Upload User Avatar
     * @param AvatarRequest $request
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
     * @param Request $request
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'sometimes|min:11|numeric',
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255',
            'bank_name' => 'sometimes|string',
            'account_name' => 'sometimes|string',
            'account_number' =>'sometimes|numeric',
            'driving_license' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = $this->userService->update( $request->except(['password',  'image_url', 'uuid']));
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
        $location = $this->locationService->addLocation($data);
        return $this->respondWithSuccess($location, 201);
    }

    public function getLocations()
    {
        return $this->respondWithSuccess($this->locationService->getLocations());
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

    public function editLocation(int $id, LocationRequest $request)
    {
        $data = $request->validated();
        return $this->respondWithSuccess($this->locationService->editLocation($id, $data));
    }

    public function getCards()
    {
        $user = getUser();
        return $this->respondWithSuccess($user->cards);
    }

    public function setExpoToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expo_token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = $this->userService->update([
            'expo_token' => $request->get('expo_token'),
        ]);
        return $this->respondWithSuccess($user, 201);
    }

    public function getFaqs()
    {
        return $this->respondWithSuccess($this->settings->getAllFaqs());
    }

    public function getCompanyInfo(String $type)
    {
        return $this->respondWithSuccess($this->settings->getCompanyInfo($type));
    }
}
