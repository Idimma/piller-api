<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use App\Services\PaystackService;
use Log;


class PaymentController extends Controller
{
    //
    private $payment;

    public function __construct(PaystackService $payment)
    {
        $this->payment = $payment;
    }

    public function initiateCardTransaction()
    {
        $response = $this->payment->initiateCardTransaction();
        if (!$response->status) {
            return $this->respondWithError(['error' => 'Something went wrong'], 500);
        }
        return $this->respondWithSuccess(['data' => $response->data]);
    }

    public function verifyCardTransaction(Request $request)
    {
        $response = $this->payment->verifyCardTransaction($request);

//        Log::info($response);
        $user = getUser();
        if (!$response->status) {
            return $this->respondWithError(['error' => $response->message], 422);
        }
        if ($response->data['status'] !== 'success') {
            return $this->respondWithError(['error' => 'Transaction not completed'], 422);
        }

      Transactions::create([
          'user_id'=> $user->id,
            'type' => 'credit',
            'plan_id' => $request->plan_id,
            'completed' => true,
            'status' => 'Successful',
            'block' => $response->block_target,
            'cement' => $response->cement_target,
            'amount' => $response->data['amount']/100,
        ]);

        $user->cards()->updateOrCreate([
            'last_four' => $response->data['authorization']['last4'],
            'customer_id' => $response->data['customer']['id'],
            'authorization_code' => $response->data['authorization']['authorization_code'],
            'customer_code' => $response->data['customer']['customer_code'],
        ]);
        return $this->respondWithSuccess(['message' => 'Successfully added card']);
    }

}
