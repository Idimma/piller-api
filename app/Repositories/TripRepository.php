<?php

namespace App\Repositories;

use App\Trip;
use App\Repositories\BaseRepository;


class TripRepository extends BaseRepository
{
    private $trip;
    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
        parent::__construct($trip);
    }

    public function getTripByStatus(int $id, $count=15)
    {
        return $this->trip->getTripByStatus($id)->paginate($count);
    }

    public function getBulkTripByStatus(array $ids, $count=15)
    {
        return $this->trip->getBulkTripByStatus($ids)->paginate($count);

    }

    
}
