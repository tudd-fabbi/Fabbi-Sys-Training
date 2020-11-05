<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    protected $task;

    public function getModel()
    {
        return Task::class;
    }

    public function getTasks()
    {
//        dd($request->all());
//        $data = $request->all();
        return $this->model->paginate(5);
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }
}
