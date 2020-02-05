<?php

namespace App\Services;

use App\Repositories\TripRepository;

class TripService
{

    public function __construct(TripRepository $trip)
    {
        $this->trip = $trip;
    }

    public function requestTrip(array $input)
    {
        $user_id = getUser()->id;
        $input['user_id'] = $user_id;
        $input['status_id'] = 1;
        $distance = getDistanceFromLatLon(
            $input['start_latitude'],
            $input['start_longitude'],
            $input['dest_latitude'],
            $input['dest_longitude']
        );
        return $distance;
        // $trip = $this->trip->create($input);
    }
}
