<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function getTasks($request)
    {
        $tasks = $this->model;
        if (!empty($request['name'])) {
            return [
                'success' => true,
                'data' => $tasks->where('name', 'like', '%' . $request['name'] . '%')->paginate($request['perPage'])
            ];
        }
        return [
            'success' => true,
            'data' => $tasks->paginate($request['perPage'])
        ];
    }
}
