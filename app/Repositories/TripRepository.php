<?php

namespace App\Repositories;

use App\Trip;
use App\Repositories\BaseRepository;


class TripRepository extends BaseRepository
{

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
        parent::__construct($trip);
    }

    public function getTripByStatus(int $id, $count=15)
    {
        return $this->trip->getTripByStatus($id)->paginate($count);
    }
}
