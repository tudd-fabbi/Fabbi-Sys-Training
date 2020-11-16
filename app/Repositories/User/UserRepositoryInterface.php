<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function addUser(array $data);
    public function getListUser(array $data);
}

