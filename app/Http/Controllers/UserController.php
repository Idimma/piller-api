<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AvatarRequest, LocationRequest, UserPhoneRequest, UserRegistrationRequest};
use App\Services\{LocationService, SettingService, UserService};
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    //
    private $settings;

    public function __construct(
        UserService $userService,
        LocationService $location,
        Transactions $transactions,
        SettingService $settings
    )
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

    public function webRegister(Request $request)
    {
        Validator::validate($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|unique:users',
            'country' => 'sometimes|string',

        ]);
        $user = $this->userService->register($request->all());
        \Auth::guard()->login($user);
        return redirect('home')->with('success', 'Successfully Registered, Please verify your account');
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

    public function userTransactions()
    {
        if (!$user = getUser()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }
        return $this->respondWithSuccess([
            'transactions' => $user->transactions,
            'total_paid' => (new \App\Transactions)->getUserTotalPaid(),
            'material_deposited' => (new \App\Transactions)->getMaterialDeposited(),
            'material_withdrawn' => (new \App\Transactions)->getMaterialWithdrawn(),
        ]);
    }


    public function userCard()
    {
        if (!$user = getUser()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }
        return $this->respondWithSuccess($user->cards);
    }

    public function userActiveCard()
    {
        if (!$user = getUser()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }
        return $this->respondWithSuccess($user->activeCard());
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
            'account_number' => 'sometimes|numeric',
            'driving_license' => 'sometimes',
            'country' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = $this->userService->update($request->except(['password', 'image_url', 'uuid']));
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

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current' => 'required|string',
            'password' => 'required|string',
            'confirm' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = getUser();
        if (Hash::check($request->current, $user->password) === false) {
            return $this->respondWithError('Enter your current password correctly ', 400);
        }
        $user->update(['password' => Hash::make($request->password)]);
        return $this->respondWithSuccess('Success', 201);
    }


    public function makeWithdrawal(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'location_type' => 'required',
            'password' => 'required|string',
            'block_target' => 'required',
            'cement_target' => 'required',
            'plan_id' => 'required',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $user = getUser();
        if (Hash::check($request->password, $user->password) === false) {
            return $this->respondWithError('Enter your current password correctly ', 400);
        }
        $plan = Plan::findOrFail($request->plan_id);
        $plan->cement_target -= $request->block_target;
        $plan->cement_target -= $request->cement_target;

        $plan->save();

        $withdrawal = Withdrawal::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'block_unit' => $request->block_target,
            'cement_unit' => $request->cement_target,
            'location_type' => $request->location_type,
            'address' => $request->address
        ]);

        $transaction = Transactions::create([
            'user_id' => $user->id,
            'type' => 'debit',
            'plan_id' => $request->plan_id,
            'completed' => true,
            'reference' => uniqid('', true),
            'block' => $request->block_target,
            'cement' => $request->cement_target,
            'amount' => 0,
        ]);
        return $this->respondWithSuccess($transaction);
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->withStatus('Successfully Deleted User');
    }

    public function singleUser($id)
    {
        $user = User::where('uuid', $id)->firstOrFail();
        return view('single-user', compact('user'));
    }
}
