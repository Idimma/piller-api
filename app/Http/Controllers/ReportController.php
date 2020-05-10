<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{UserService, TripService};

class ReportController extends Controller
{
    //
    private $userService;
    private $tripService;
    public function __construct(UserService $userService, TripService $tripService)
    {
        $this->userService = $userService;
        $this->tripService = $tripService;
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
    public function getDrivers(Request $request){
        $per_page = $request->get('perPage');
        return $this->respondWithSuccess($this->userService->getDrivers($per_page));
    }

    /**
     * Retrieve all Users
     * @return JsonResponse
     */
    public function getUsers(Request $request){
        $per_page = $request->get('perPage');
        return $this->respondWithSuccess($this->userService->getUsers($per_page));
    }

    /**
     * Retrieves all count summary
     * @return JsonResponse
     */
    public function reportSummary(){
        $data = $this->userService->reportDriversAndCustomers();
        return $this->respondWithSuccess(['data' => array_merge($data, $this->tripService->tripReportSummary())]);
    }
}
