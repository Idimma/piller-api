<?php
namespace App\Services;
use App\UserLocation;


class LocationService{

    public function __construct( UserLocation $userlocation)
    {
        $this->user_location = $userlocation;

    }

    public function addLocation(array $input)
    {
        $user = getUser();
        return $user->destination()->firstOrCreate($input);
    }

    public function getLocations(object $user = null)
    {
        if(null === $user){
            $user = getUser();
        }
        return $user->destination;
    }

    public function editLocation(int $id, array $input)
    {
        $location = $this->user_location::findOrFail($id);
        return $location->update($input);
    }
}