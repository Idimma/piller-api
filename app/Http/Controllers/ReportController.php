<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class ReportController extends Controller
{
    //
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


     /**
     * Retrieves Count of all app users
     * @return JsonResponse
     */

    public function getUsersCount(){
        return $this->respondWithSuccess($this->userService->getUsersCount());
    }

    /**
     * Retrieves Count of All Drivers
     * @return JsonResponse
     */
    public function getDriversCount(){
        return $this->respondWithSuccess($this->userService->getDriversCount());
    }


    /**
     * Retrieve all Drivers
     * @return JsonResponse
     */
    public function getDrivers(){

        return $this->respondWithSuccess($this->userService->getDrivers());
    }

    /**
     * Retrieve all Users
     * @return JsonResponse
     */
    public function getUsers(){
        return $this->respondWithSuccess($this->userService->getUsers());
    }

    /**
     * Retrieves all count summary
     * @return JsonResponse
     */
    public function reportSummary(){
        return $this->respondWithSuccess(['data' => $this->userService->reportSummary()]);
    }
}
