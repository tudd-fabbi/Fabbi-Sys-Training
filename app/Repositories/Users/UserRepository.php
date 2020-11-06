<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Users\UserRepositoryInterface;

/**
 * Class EquipmentRepository
 * @package App\Repositories\Equipment
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function getListUser($request)
    {
       $list = $this->model;
       if($request->has('search') && $request->search) {
           $list = $list->where('name','LIKE',"%$request->search%");
       }

       return [
           'success'  => true,
           'listUser' => $list->get()
       ];

    }
}
