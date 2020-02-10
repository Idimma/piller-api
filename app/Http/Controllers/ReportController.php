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
        return $this->respondWithSuccess(['data' => $this->userService->reportSummary()]);
    }
}
