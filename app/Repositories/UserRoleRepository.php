<?php

namespace App\Repositories;

use App\UserRole;
use App\Repositories\BaseRepository;


class UserRoleRepository extends BaseRepository
{

    public function __construct(UserRole $userrole)
    {
        parent::__construct($userrole);
        $this->userrole = $userrole;
    }

    public function getCountByRole(int $role_id)
    {
        return $this->userrole->queryByRole($role_id)->count();
    }

    public function getUsersByRole(int $role_id, $count=15)
    {
        return $this->userrole->usersByRole($role_id, $count);

    }

    public function getCountNewRoleUser(int $role_id)
    {
        return $this->userrole->queryByRole($role_id)->has('newUsers')->count();
    }

    public function getCountActive(int $role_id, int $status)
    {
        return $this->userrole->queryByRole($role_id)->whereHas('user', function($q) use($status){
            return $q->active($status);
        })->count();
    }
}
