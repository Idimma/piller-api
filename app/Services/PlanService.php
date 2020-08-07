<?php

namespace App\Services;

use App\Events\PlanEvent;
use App\Notifications\NewWithdrawalRequest;
use App\Repositories\PlanRepository;
use Illuminate\Support\Arr;
use Notification;
use Log;
class PlanService
{

    private $location, $plan, $user, $planDetail, $plan_stage;

    public function __construct(PlanRepository $plan, UserService $user, LocationService $location)
    {
        $this->plan = $plan;
        $this->user = $user;
        $this->location = $location;
    }

    public function requestPlan(array $input)
    {
        $user = getUser();
        $plan = $this->plan->create(array_merge($input, [
            'user_id'=>$user->id]));

//        $this->updateStage($plan->id, 2);

        // broadcast(new PlanEvent($plan));

//        $admins = $this->user->getAdmins();
//        Notification::send($admins, new NewWithdrawalRequest($plan));
        return $plan;
    }

    public function getAllRequests($per_page = 15)
    {
        return $this->plan->paginate($per_page);
    }

    public function userPlans()
    {
        $user = getUser();
        return $user->userPlan()->latest()->get();
    }

    public function userLastPlans()
    {
        $user = getUser();
        return $user->userPlan()->latest()->take(4)->get();
    }

    public function getPlanByStatus(int $id, $page)
    {
        return $this->plan->getPlanByStatus($id, $page);
    }

    public function getBulkPlanByStatus(array $ids, $page)
    {
        return $this->plan->getBulkPlanByStatus($ids, $page);
    }

    public function getPlan(Int $id)
    {
        return $this->plan->get($id);
    }


    public function assignDriver(int $id, string $uuid, int $amount)
    {
        $driver = $this->user->getUserByUuid($uuid);
        $plan = $this->getPlan($id);

        $data = $this->plan->update($plan, [
            'driver_id' => $driver->id,
            'status_id' => 1,
            'price' => $amount,
        ]);

        if ($plan->user->expo_token) {
            ExpoNotification::sendNotification($plan->user->expo_token, 'Order Confirmed', 'Plan Request has been confirmed', []);
        }

        $this->updateStage($plan->id, 1);
        return $data;
    }


    public function delete(int $id)
    {
        return $this->plan->delete($id);
    }

    public function acceptPlan(int $id)
    {
        return $this->changePlanStatus($id, 3);
    }

    public function completePlan(int $id)
    {
        return $this->changePlanStatus($id, 4);
    }

    public function cancelPlan(int $id)
    {
        return $this->changePlanStatus($id, 5);
    }

    private function changePlanStatus(int $id, int $status)
    {
        if (!$this->validatePlanUser($id)) {
            return ['error' => 'Unauthorized to access plan request'];
        };

        $plan = $this->getPlan($id);

        $this->plan->update($plan, ['status_id' => $status]);

        $this->updateStage($id, $status);
        return $this->getPlan($id);
    }

    public function planReportSummary()
    {
        return [
            'all_plans' => $this->plan->count(),
            'pending_plans' => $this->plan->getPlanByStatusCount(2),
            'completed_plans' => $this->plan->getPlanByStatusCount(4),
        ];
    }

    public function trackPlan(int $id)
    {
        $plan = $this->getPlan($id);
        $resource = [
            'Order Placed' => '2',
            'Order confirmed' => '1',
            'On the way' => '3',
            'Delivered' => '4',
            'Canceled' => '5'
        ];

        $track = [];
        foreach ($resource as $key => $stage) {
            $l = $plan->stages->where('status_id', $stage)->first();
            $track[$key] = [
                'status_name' => $key,
                'isCompleted' => isset($l),
                'isActive' => $plan->stages->last() === $l,
                'timestamp' => isset($l) ? $l->toArray()['created_at'] : false
            ];
        }

        //  add driver
        $track['driver'] = $plan->driver();
        return $track;
    }

    public function setPlanReview(int $id, array $data)
    {
        if (!$this->validatePlanUser($id)) {
            return ['error' => 'Unauthorized to access plan request'];
        };
        $review = $this->planDetail->updateOrCreate([
            'plan_id' => $id,
            'reviewer_id' => getUser()->id,
        ], $data);
        return $review;
    }

    private function updateStage(Int $plan_id, int $status)
    {
        return $this->plan_stage->create(['status_id' => $status, 'plan_id' => $plan_id]);
    }

    /**
     * Validate the user can modify plan
     * @return bool
     */
    private function validatePlanUser(int $plan_id): bool
    {
        $user = getUser();
        $plan = $this->getPlan($plan_id);
        if ($plan->user_id === $user->id || $plan->driver_id === $user->id) {
            return True;
        };
        return false;
    }
}
