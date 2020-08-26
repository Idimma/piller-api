<?php

use Tymon\JWTAuth\Facades\JWTAuth;


/**
 * Gets authenticated user
 * @return User model
 */
function getUser()
{
    if(auth()->check()){
        return  auth()->user();
    }
    return JWTAuth::parseToken()->authenticate();
}

function linkActive($route)
{
    $url = explode('/', request()->url());
    return request()->is($route) || ($url[3] && $url[3] . 's' === $route) ? 'active' : '';
}


/**
 *
 * Gets distance between two points from coordinates in km
 * @param float $lat1
 * @param float $lat2
 * @param float $lon1
 * @param float $lon2
 * @return Distance in Kilometers
 */

function getDistanceFromLatLon(float $lat1, float $lon1, float $lat2, float $lon2): float
{

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;

    return ($miles * 1.609344);
}
