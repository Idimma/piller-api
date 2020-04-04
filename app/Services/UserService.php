<?php

namespace App\Services;

use App\Repositories\{UserRepository, UserRoleRepository};
use App\Services\LocationService;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Mail\VerifyUser;
use Mail;




class UserService
{

    public function __construct(UserRepository $user, UserRoleRepository $user_role, LocationService $locationService)
    {
        $this->user = $user;
        $this->user_role = $user_role;
        $this->locationService = $locationService;
    }

    public function register(array $input, $role_id = 3)
    {
        $input['password'] = Hash::make($input['password']);
        $user = $this->user->create($input);
        $user->userrole()->create(['role_id' => $role_id]);
        $token = $this->generateVerificationToken($user);
        Mail::to($input['email'])->send(new VerifyUser($user, $token));
        return $user;
    }

    public function getUserNotifications()
    {
        $user = getUser();
        return $user->notifications;
    }

    public function authenticate(array $credentials, int $role_id = null)
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return ['error' => 'invalid credentials', 'status' => 400];
            }
        } catch (JWTException $e) {
            return ['error' => 'could not create token', 'status' => 500];
        }
        $isValid = $this->isValidUser($role_id);
        if(is_array($isValid)){
            return $isValid;
        }
        return $token;
    }

    public function generateVerificationToken(object $user)
    {
        return $user->verificationToken()->firstOrCreate(['token' => md5(uniqid(rand(), true))]);
    }

    public function update(array $data, object $user = null)
    {
        if (null == $user) {
            $user = getUser();
        }
        return $this->user->update($user, $data);
    }

    private function isValidUser(int $role_id = null){
        $user = JWTAuth::user();

        if (!$user->is_verified) {
            $this->getUserVerificationToken($user);
            return ['error' => 'Account not Activated. Check your mail', 'status' => 401];
        }
        if (!$user->status) {
            return ['error' => 'Account Disabled. Contact customer case', 'status' => 401];
        }
        if (isset($role_id)) {
            if ($user->userrole->role_id !== $role_id) {
                return ['error' => 'Not Authorised', 'status' => 401];
            }
        }
        return True;
    }

    private function getUserVerificationToken(Object $user)
    {
        $token = $user->verificationToken;

        if (!isset($token)) {
            $token = $this->generateVerificationToken($user);
            Mail::to($user->email)->send(new VerifyUser($user, $token));
        }
        return $token;
    }


    public function avatarUpload(array $data)
    {
        $uploadedFile = $data['profile_image'];
        $filename = getUser()->first_name . '-' . time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(storage_path('app/public/avatar'), $filename);
        return $this->update(['image_url' => $filename]);
    }

    public function getUsersCount()
    {
        return $this->user_role->getCountByRole(3);
    }

    public function getDriversCount()
    {
        return $this->user_role->getCountByRole(2);
    }
    public function getAdmins()
    {
        return $this->user_role->getUsersByRole(1);
    }

    public function getUsers(int $per_page)
    {
        return $this->user_role->getUsersByRole(3, $per_page);
    }

    public function getDrivers(int $per_page)
    {
        return $this->user_role->getUsersByRole(2, $per_page);
    }

    public function reportSummary()
    {
        $data = [
            'users' => $this->getUsersCount(),
            'drivers' => $this->getDriversCount(),
            'trucks'  => 0
        ];
        return $data;
    }

    public function createDriver(array $input)
    {
        $user = $this->register($input, 2);
        $user->userdetail()->create($input);
        return $user;
    }



    public function getUserByUuid(string $uuid)
    {
        return $this->user->getUserByUuid($uuid);
    }


    public function getAvailableDrivers()
    {
        return $this->user->availableDrivers();
    }

    public function toggleUserStatus(string $uuid)
    {
        $user = $this->getUserByUuid($uuid);
        $status = 1 === $user->status ? 0 : 1;
        return $this->update(['status' => $status], $user);
    }

    public function getUserLocation(string $uuid)
    {
        $user = $this->getUserByUuid($uuid);
        return $this->locationService->getLocations($user);
    }
}
