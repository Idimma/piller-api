<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Services\PaystackService;
use App\Transactions;
use Illuminate\Http\Request;


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

        // Log::info($response);
        $user = getUser();
        if (!$response->status) {
            return $this->respondWithError(['error' => $response->message], 422);
        }
        if ($response->data['status'] !== 'success') {
            return $this->respondWithError(['error' => 'Transaction not completed'], 422);
        }

        Transactions::create([
            'user_id' => $user->id,
            'type' => 'credit',
            'plan_id' => $request->plan_id,
            'completed' => true,
            'reference' => $request->reference,
            'block' => $request->block_target,
            'cement' => $request->cement_target,
            'amount' => $request->amount,
        ]);

        $user->cards()->updateOrCreate([
            'last_four' => $response->data['authorization']['last4'],
            'customer_id' => $response->data['customer']['id'],
            'authorization_code' => $response->data['authorization']['authorization_code'],
            'customer_code' => $response->data['customer']['customer_code'],
        ]);
        return $this->respondWithSuccess(['message' => 'Successfully added card']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validateCardTransaction(Request $request)
    {
        $response = $this->payment->verifyCardTransaction($request);
        $user = getUser();
        $plan_id = $response->data['metadata']['plan_id'];
        $transaction_id = $response->data['metadata']['transaction_id'];

        if (!$response->status) {
            return redirect('plans')->with('error', $response->message);
        }
        if ($response->data['status'] !== 'success') {
            return redirect('plans')->with('error', 'Transaction not completed');
        }

        $plan = Plan::find($plan_id);
        $trans = Transactions::find($transaction_id);
        $card = $this->saveCard($user, $response);

        if ($trans) {
            $trans->completed = true;
            $trans->card_id = $card->id;
            $trans->save();
        }
        if ($plan) {
            $next_deposit = now()->addDay($plan->deposit_frequency);
            $plan->plan_status = 'STARTED';
            $plan->next_deposit_date = $next_deposit;
            $plan->card_id = $card->id;
            $plan->save();
        }

        return redirect('plan/' . $plan_id)
            ->with('success', 'Successfully created')
            ->with('alert', 'Successfully added card');
    }

    public function addCard(Request $request)
    {
        $response = $this->payment->verifyCardTransaction($request);
        $user = getUser();
        $transaction_id = $response->data['metadata']['transaction_id'];

        if (!$response->status) {
            return redirect('plans')->with('error', $response->message);
        }
        if ($response->data['status'] !== 'success') {
            return redirect('plans')->with('error', 'Transaction not completed');
        }

        $trans = Transactions::find($transaction_id);

        $card = $this->saveCard($user, $response);

        if ($trans) {
            $trans->completed = true;
            $trans->card_id = $card->id;
            $trans->save();
        }
        return redirect('cards')->with('success', 'Successfully added card');
    }

    /**
     * @param \User $user
     * @param \App\Services\JsonResponse $response
     * @return mixed
     */
    public function saveCard($user, $response)
    {
        $card = $user->cards()->updateOrCreate([
            'last_four' => $response->data['authorization']['last4'],
            'exp_year' => $response->data['authorization']['exp_year'],
            'exp_month' => $response->data['authorization']['exp_month'],
            'bank' => $response->data['authorization']['bank'],
            'account_name' => $response->data['authorization']['account_name'],
            'used' => true,
            'customer_id' => $response->data['customer']['id'],
            'authorization_code' => $response->data['authorization']['authorization_code'],
            'customer_code' => $response->data['customer']['customer_code'],
        ]);
        return $card;
    }


}
