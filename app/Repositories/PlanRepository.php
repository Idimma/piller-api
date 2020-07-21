<?php

namespace App\Repositories;

use App\Plan;
use App\Repositories\BaseRepository;


class PlanRepository extends BaseRepository
{
    private $plan;
    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
        parent::__construct($plan);
    }

    public function getPlanByStatus(int $id, $count=15)
    {
        return $this->plan->getPlanByStatus($id)->paginate($count);
    }

    public function getBulkPlanByStatus(array $ids, $count=15)
    {
        return $this->plan->getBulkPlanByStatus($ids)->paginate($count);
    }

    public function getPlanByStatusCount(int $id)
    {
        return $this->plan->getPlanByStatus($id)->count();
    }
}
