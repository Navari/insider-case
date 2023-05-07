<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
       parent::__construct($user);
    }
}
