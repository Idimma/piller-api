<?php

use Tymon\JWTAuth\Facades\JWTAuth;


/**
 * Gets authenticated user
 * @return User model
 */
function getUser()
{
    if (auth()->check()) {
        return auth()->user();
    }
    return JWTAuth::parseToken()->authenticate();
}

function linkActive($route)
{
    $url = explode('/', request()->url());
    return request()->is($route) || ($url[3] && $url[3] . 's' === $route) ? 'active' : '';
}

function array_random($arr, $num = 1)
{
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

function nf($num = 0, $d = 2)
{
    return number_format($num, $d);
}

function material()
{
    return \App\Material::get();
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

function currency($country = '')
{

    if (!auth()->check()) {
        return '$';
    }
    if ($country === '') {
        $country = strtolower(auth()->user()->country);
    }
    if ($country === 'nigeria') {
        return '₦';
    }
    if ($country === 'ghana') {
        return '₵';
    }
    if ($country === 'kenya') {
        return 'KSh';
    }
    return '$';

}
