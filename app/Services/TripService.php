<?php

namespace App\Services;

use App\Repositories\TripRepository;
use App\Services\UserService;
use App\Events\TripEvent;
use App\Notifications\NewTruckRequest;
use App\TripDetail;
use Notification;

class TripService
{

    private $location, $trip, $user, $tripDetail;

    public function __construct(TripRepository $trip, UserService $user, LocationService $location, TripDetail $tripDetail)
    {
        $this->trip = $trip;
        $this->user = $user;
        $this->userLocation = $location;
        $this->tripDetail = $tripDetail;
    }

    public function requestTrip(array $input)
    {
        $location = $this->userLocation->addLocation($input);
        $basefare = 1000;
        $data = [
            'user_id' => getUser()->id,
            'destination' => $location->id,
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
        return $user->userTrip()->latest()->get();
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
            'trip_started' => now()->addHour(1),
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
        return $this->changeTripStatus($id, 3);
    }

    public function completeTrip(int $id)
    {
        return $this->changeTripStatus($id, 4);
    }

    public function cancelTrip(int $id)
    {
        return $this->changeTripStatus($id, 5);
    }

    private function changeTripStatus(int $id, int $status)
    {
        if (!$this->validateTripUser($id)) {
            return ['error' => 'Unauthorized to access trip request'];
        };
        $trip = $this->getTrip($id);
        $this->trip->update($trip, ['status_id' => $status]);

        return $this->getTrip($id);
    }

    public function setTripReview(int $id, array $data)
    {
        if (!$this->validateTripUser($id)) {
            return ['error' => 'Unauthorized to access trip request'];
        };
        $review = $this->tripDetail->updateOrCreate([
            'trip_id' => $id,
            'reviewer_id' => getUser()->id,
        ], $data);
        return $review;
    }

    /**
     * Validate the user can modify trip
     * @return bool
     */
    private function validateTripUser(int $trip_id): bool
    {
        $user = getUser();
        $trip = $this->getTrip($trip_id);
        if ($trip->user_id === $user->id || $trip->driver_id === $user->id) {
            return True;
        };
        return false;
    }
}
