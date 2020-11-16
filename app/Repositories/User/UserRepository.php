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

    public function addUser(array $data)
    {
        try {
           $user = $this->user->create($data);
           $userData = $this->user->find($user->id);
           $courseId = $data['course'];
           $userData->courses()->attach($courseId, ['status' => 'Create']);

           return [
               'success' => true
           ];
        }
        catch(\Exception $e) {
            return [
                'success' => false
            ];
        }
    }

    public function getListUser(array $data)
    {
       $list = $this->model;
       $perPage = $data['perPage'];
       if(array_key_exists('search', $data) && !empty($data['search']))
       {
          $input = $data['search'];
          $list = $list->where('name', 'LIKE', "%$input%");
       }

       return [
          'success' => true,
          'listUser' => $list->paginate($perPage)
       ];
    }
}
