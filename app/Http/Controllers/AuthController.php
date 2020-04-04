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
            return response()->json(['success' => false, 'error' => "Verification code is invalid."]);
        }
        $user = $check->user;
        if ($user->is_verified == 1) {
            return response()->json([
                'success' => true,
                'message' => 'Account already verified..'
            ]);
        }

        $user->update(['is_verified' => 1]);
        $check->delete();

        return response()->json([
            'success' => true,
            'message' => 'You have successfully verified your email address.'
        ]);
    }
}
