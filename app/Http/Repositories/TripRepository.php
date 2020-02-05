<?php

namespace App\Repositories;

use App\Trip;
use App\Repositories\BaseRepository;


class TripRepository extends BaseRepository
{

    public function __construct(Trip $trip)
    {
        parent::__construct($trip);
    }
}
