<?php

namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    
}
