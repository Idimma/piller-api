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

    public function getUsersByRole(int $role_id, $count)
    {
        $count = $count ?? 15;
        return $this->userrole->usersByRole($role_id, $count);

    }
}
