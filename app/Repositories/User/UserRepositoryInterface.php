<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function addUser(array $data);
    public function getListUser(array $data);
    public function countSubjectById($id);
    public function countTaskById($id);
    public function getUserNameById($id);
}

