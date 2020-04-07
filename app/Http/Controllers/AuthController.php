<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserVerification;

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
}
