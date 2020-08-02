<?php

namespace App\Http\Controllers;

use App\UserVerification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\{Password, Validator};

class AuthController extends Controller
{
    //
    public function verifyUser(String $verification_code)
    {
        $check = UserVerification::where('token', $verification_code)->first();

        if (is_null($check)) {
            return $this->respondWithError(['error' => "Verification code is invalid."]);
        }
        $user = $check->user;
        if ($user->is_verified == 1) {
            return $this->respondWithSuccess(['message' => 'Account already verified..']);
        }
        $user->update(['is_verified' => 1]);
        $check->delete();
        return $this->respondWithSuccess(['message' => 'You have successfully verified your email address.']);
    }

    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email',]);

        if ($validator->fails()) {
            return $this->respondWithError($validator->errors(), 400);

        }
        try {
            $response = Password::sendResetLink($request->only('email'), static function (Message $message) {
                $message->subject("PASSWORD RESET");
            });
            switch ($response) {
                case Password::RESET_LINK_SENT:
                    return $this->respondWithSuccess(trans($response));
                case Password::INVALID_USER:
                    return $this->respondWithSuccess(trans($response));
            }
        } catch (\Swift_TransportException $ex) {
            return $this->respondWithError($ex->getMessage(), 400);
        } catch (Exception $ex) {
            return $this->respondWithError($ex->getMessage(), 400);
        }

    }


}
