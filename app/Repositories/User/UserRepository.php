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
           $userData->courseUser()->attach($courseId,['state' => 'Create']);

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
}
