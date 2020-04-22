<?php

namespace App\Services;

use App\Repositories\TripRepository;
use App\Services\UserService;
use App\Events\TripEvent;
use App\Notifications\NewTruckRequest;
use App\{TripDetail, TripStage};
use Notification;

class TripService
{

    private $location, $trip, $user, $tripDetail, $trip_stage;

    public function __construct(TripRepository $trip, UserService $user, LocationService $location, TripDetail $tripDetail, TripStage $trip_stage)
    {
        $this->trip = $trip;
        $this->user = $user;
        $this->userLocation = $location;
        $this->tripDetail = $tripDetail;
        $this->trip_stage = $trip_stage;
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
        $this->updateStage($trip->id, 2);
        broadcast(new TripEvent($trip));
        $admins = $this->user->getAdmins();
        Notification::send($admins, new NewTruckRequest($trip));
        return $trip;
    }

    public function getAllRequests($per_page = 15)
    {
        return $this->trip->paginate($per_page);
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
            'status_id' => 1
        ]);
        $this->updateStage($trip->id, 1);
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
        $this->updateStage($id, $status);
        return $this->getTrip($id);
    }

    public function trackTrip(int $id)
    {
        $trip = $this->getTrip($id);
        $resource = [
            'Order Placed' => '2',
            'Order confirmed' => '1',
            'On the way' => '3',
            'Delivered' => '4',
            'Canceled' => '5'
        ];

        $track = [];
        foreach ($resource as $key => $stage) {
            $l = $trip->stages->where('status_id', $stage)->first();
            $track[$key] = [
                'status_name' => $key,
                'isCompleted' => isset($l),
                'isActive'    => $trip->stages->last() === $l,
                'timestamp'   => isset($l) ? $l->toArray()['created_at']: false
            ];
        }
        return $track;
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

    private function updateStage(Int $trip_id, int $status)
    {
        return $this->trip_stage->create(['status_id' => $status, 'trip_id' => $trip_id]);
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
