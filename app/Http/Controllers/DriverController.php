<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\{UserService, TripService, PaystackService};
use App\Transactions;
use Illuminate\Support\Facades\{Validator};






class DriverController extends Controller
{
    //
    private $tripService, $userService, $payment;
    public function __construct(UserService $userService, TripService $tripService, PaystackService $payment)
    {
        $this->userService = $userService;
        $this->tripService = $tripService;
        $this->payment = $payment;
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

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'new_password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);
        }
        $response = $this->userService->passwordChange($request->get('password'), $request->get('new_password'));
        if(is_array($response)){
            return $this->respondWithError($response);
        }
        return $this->respondWithSuccess($response);
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

    public function completeTrip(Int $id, Request $request)
    {
        $trip = $this->tripService->getTrip($id);
        $user = $this->userService->getUserByUuid($trip->user->uuid);
        $card = $user->activeCard();
        $payment = $this->payment->chargeCustomer($trip->price."00", $card->authorization_code, $user);
        if (!$payment->status){
            return $this->respondWithError(['error' => 'Payment Failed', 'message' => $payment->message]);
        }
        $verify = $this->payment->verifyCardTransaction(new Request(['reference' => $payment->data['reference']]));
        if(!$verify->status){
            return $this->respondWithError(['error' => 'Payment Failed... please check your card', 'message' => $payment->message]);
        }
        Transactions::create([
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'status' => 1,
            'reference' => $payment->data['reference']
        ]);
        return $this->respondWithSuccess($this->tripService->completeTrip($id));
    }
}
