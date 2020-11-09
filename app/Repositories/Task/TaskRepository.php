<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getModel()
    {
        return Task::class;
    }

    public function getTasks($request)
    {
        $data = $request->all();
        $tasks = $this->model;
        if (!empty($data['name'])) {
            return $tasks->where('name', 'like', '%' . $data['name'] . '%')->paginate(5);
        }
        return $this->model->paginate(5);
    }

    public function createTask($request)
    {
        $task = $this->model->create($request->all());
        return $task->subjectTask()->sync([$request->subject_id => ['status' => 1]]);
    }
}
