<?php

namespace App\Services;

use App\Repositories\TripRepository;
use App\Services\UserService;
use App\Events\TripEvent;
use App\Notifications\NewTruckRequest;
use Notification;

class TripService
{

    public function __construct(TripRepository $trip, UserService $user, LocationService $location)
    {
        $this->trip = $trip;
        $this->user = $user;
        $this->userLocation = $location;
    }

    public function requestTrip(array $input)
    {
        $location = $this->userLocation->addLocation($input);
        $basefare = 1000;
        $data = [
            'user_id' => getUser()->id,
            'destination' => $location->id,
            'trip_start' => now()->addhours(1),
            'status_id' => 2,
            'price' => $basefare,
        ];
        $trip = $this->trip->create($data);
        broadcast(new TripEvent($trip));
        $admins = $this->user->getAdmins();
        Notification::send($admins, new NewTruckRequest($trip));
        return $trip;
    }

    public function getAllRequests()
    {
        return $this->trip->all();
    }

    public function userTrips()
    {
        $user = getUser();
        return $user->userTrip;
    }


    public function getTripByStatus(int $id, $page)
    {
        return $this->trip->getTripByStatus($id, $page);
    }

    public function getBulkTripByStatus(array $ids, $page)
    {
        return $this->trip->getBulkTripByStatus($ids, $page);
    }

    public function getTrip(Int $id)
    {
        return $this->trip->get($id);
    }


    public function assignDriver(int $id, string $uuid)
    {
        $driver = $this->user->getUserByUuid($uuid);
        $trip = $this->getTrip($id);
        $data = $this->trip->update($trip, [
            'driver_id' => $driver->id,
            'status_id' => 1
        ]);
        return $data;
    }

    public function delete(int $id)
    {
        return $this->trip->delete($id);
    }

    public function acceptTrip(int $id)
    {
        $driver = getUser();
        $trip = $this->getTrip($id);
        if($trip->driver_id !== $driver->id){
            return ['error' => 'Unauthorized to accept trip request']
        };
        $data = $this->trip->update($trip, ['status_id' => 3]);
        return $data;
    }
}
