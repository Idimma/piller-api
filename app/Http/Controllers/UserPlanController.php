<?php

namespace App\Http\Controllers;

use App\Http\Requests\{PlanRequest, PlanReviewRequest, UpdatePlanRequest};
use App\Services\PlanService;
use Illuminate\Http\Request;


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

    /**
     * Gets Only Authenticated User Plans data
     * @return JsonResponse
     */
    public function getUserPlans()
    {
        return $this->respondWithSuccess($this->planService->userPlans());
    }

    public function update(UpdatePlanRequest $planRequest)
    {
        $plan_id = $planRequest->plan_id;
        $plan = $this->planService->getPlan($plan_id)->firstOrFail();
        $plan->update($planRequest->all());
        return $this->respondWithSuccess($plan);
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

    public function trackPlan(int $id)
    {
        return $this->respondWithSuccess($this->planService->trackPlan($id));
    }
}
