<?php

namespace App\Http\Controllers;

use App\Http\Requests\{PlanRequest, PlanReviewRequest, UpdatePlanRequest};
use App\Plan;
use App\Services\PlanService;
use App\Transactions;
use Illuminate\Http\Request;
use Paystack;


class UserPlanController extends Controller
{
    private $planService;

    //
    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    /**
     * Persist message to database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createPlan(PlanRequest $request)
    {
        $data = $request->validated();

        $response = $this->planService->requestPlan($data);
        return $this->respondWithSuccess($response, 201);
    }

    public function create(Request $request)
    {
        $deposit = 0;

        if ($request->play_type === 'normal') {
            $deposit = 1;
            if ($request->deposit_frequency === 'Monthly') {
                $deposit = 30;
            }
            if ($request->deposit_frequency === 'Weekly') {
                $deposit = 7;
            }
        }


        $request->merge([
            'cement_percent' => 100 - $request->block_percent,
            'deposit_frequency' => $deposit,
        ]);

        \Validator::make(\request()->all(), [
            'plan_type' => 'required|string',
            'plan_name' => 'required|string',
            'building_type' => 'required|string',
            'material_estimation' => 'required',
            'material_type' => 'required',
            'cement_percentage' => 'required|numeric',
            'block_percentage' => 'required|numeric',
            'start_date' => 'required|date|after:now',
            'block_target' => 'sometimes|string',
            'cement_target' => 'sometimes|string',
            'deposit' => 'required|numeric',
            'deposit_frequency' => 'sometimes|string',
            'country' => 'sometimes|string',
        ]);

        $plan = $this->planService->requestPlan(\request()->all());
        $amount = $request->deposit * 100;
        $ref = Paystack::genTranxRef();


        $trans = Transactions::create([
            'user_id' => $plan->user_id, 'type' => 'credit',
            'plan_id' => $plan->id, 'completed' => false, 'reference' => $ref,
            'block' => $request->block_target, 'cement' => $request->cement_target,
            'amount' => $request->deposit,
        ]);


        $request->merge(
            [
                'amount' => $amount, //amount in kobo
                'email' => getUser()->email,
                'order_id' => $plan->id,
                'orderID' => $plan->id,
                'quantity' => 1,
                'reference' => $ref,
                'callback_url' => url('/payment/callback'),
                'metadata' => json_encode([
                    'custom_fields' => [
                        ['display_name' => "Transaction ID", "variable_name" => "transaction_id", "value" => $trans->id],
                        ['display_name' => "Plan ID", "variable_name" => "plan_id", "value" => $plan->id]
                    ],
                    'transaction_id' => $trans->id,
                    'plan_id' => $plan->id,
                ])
            ]
        );

        return Paystack::getAuthorizationUrl()->redirectNow();

    }

    /**
     * Gets Only Authenticated User Plans data
     * @return JsonResponse
     */
    public function getUserPlans()
    {
        return $this->respondWithSuccess($this->planService->userPlans());
    }

    /**
     * Gets Only Authenticated User Plans data
     * @return JsonResponse
     */
    public function getLastPlans()
    {
        return $this->respondWithSuccess($this->planService->userLastPlans());
    }

    public function update(UpdatePlanRequest $planRequest)
    {
        $plan_id = $planRequest->plan_id;
        $plan = $this->planService->getPlan($plan_id)->firstOrFail();
        $plan->update($planRequest->all());
        return $this->respondWithSuccess($plan);
    }

    public function updatePlan(Request $planRequest, $plan_id)
    {
        $plan = getUser()->plans->find($plan_id);
        if ($plan) {
            $plan->update($planRequest->all());
            return redirect('plan', $plan)->with('success', 'Plan successfully updated');
        }
        return redirect()->back()->with('error', 'An error occurred');

    }

    public function delete($id)
    {
        $plan_id = \request()->plan_id ?? $id;
        if ($plan_id) {
            $plan = $this->planService->delete($plan_id);
            return $this->respondWithSuccess($plan);
        }
        return $this->respondWithError('Plan Id not set');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    final public function show($id)
    {
        $plan_id = \request()->plan_id ?? $id;
        if ($plan_id) {
            $plan = $this->planService->getPlan($plan_id);
            return $this->respondWithSuccess($plan);
        }
        return $this->respondWithError('Plan Id not set');

    }


    /**
     * Get Latest Pending Plan
     * @return JsonResponse
     */
    public function getPendingPlan()
    {
        return $this->respondWithSuccess(getUser()->getPendingPlan());
    }

    /**
     * Cancel's user plans
     * @param Int $id
     * @return JsonResponse
     */
    public function cancelPlan(Int $id)
    {
        $plan = $this->planService->cancelPlan($id);
        if (isset($plan['error'])) {
            return $this->respondWithError($plan);
        }
        return $this->respondWithSuccess($plan);
    }

    public function reviewPlan(Int $id, PlanReviewRequest $request)
    {
        $data = $request->validated();
        $plan = $this->planService->setPlanReview($id, $data);
        if (isset($plan['error'])) {
            return $this->respondWithError($plan);
        }
        return $this->respondWithSuccess($plan);
    }

    public function verifyPayment()
    {

        return $this->respondWithSuccess([]);
    }

    public function trackPlan(int $id)
    {
        return $this->respondWithSuccess($this->planService->trackPlan($id));
    }

    public function normal()
    {
        $plan_type = 'normal';
        return view('pages.deposit-plan', compact('plan_type'));

    }

    public function oneTime()
    {
        $plan_type = 'one-time';
        return view('pages.deposit-plan', compact('plan_type'));
//        return view('pages.Add-one-time-deposit-plan');
    }

    public function createCard(Request $request)
    {
        $ref = Paystack::genTranxRef();
        $user = getUser();
        $trans = Transactions::create([
            'user_id' => $user->id, 'type' => 'credit',
            'completed' => false, 'reference' => $ref,
            'block' => 0, 'cement' => 0,
            'amount' => 100,
        ]);

        $request->merge(
            [
                'amount' => 10000, //amount in kobo
                'email' => $user->email,
                'quantity' => 1,
                'reference' => $ref,
                'callback_url' => url('/payment/add-card'),
                'metadata' => json_encode([
                    'custom_fields' => [
                        ['display_name' => "Tran ID", "variable_name" => "tran_id", "value" => $trans->id],
                        ['display_name' => "User ID", "variable_name" => "user_id", "value" => $user->id]
                    ],
                    'transaction_id' => $trans->id,
                    'user_id' => $user->id,
                ])
            ]
        );
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function removeCard($id)
    {
        $user = getUser();
        $card = $user->cards->find($id);
        if ($card) {
            $plans = Plan::where('card_id', $id)->get();
            if ($plans) {
                foreach ($plans as $plan) {
                    $plan->card_id = null;
                    $plan->save();
                }
            }
            $trans = Transactions::where('card_id', $id)->get();
            if ($trans) {
                foreach ($trans as $tran) {
                    $tran->card_id = null;
                    $tran->save();
                }
            }
            $card->delete();
            return back()->with('success', 'Successfully Removed Card');
        }

        return back()->with('error', 'Card not found');
    }
}
