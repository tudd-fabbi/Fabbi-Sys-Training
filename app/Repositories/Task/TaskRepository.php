<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use mysql_xdevapi\Exception;

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

    public function createTask($request)
    {
        try {
            $task = $this->model->create($request['task']);
            $task->subjects()->attach($request['subject_id'], ['status' => config('config.task.status')]);
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return [
            'success' => true
        ];
    }

    public function showTask($id)
    {
        try {
            $task = $this->model->findOrFail($id);
            return [
                'success' => true,
                'data' => $task
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteTask($id)
    {
        try {
            $task = $this->model->findOrFail($id);
            $task->subjects()->detach();
            $task->delete();
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return [
            'success' => true,
        ];
    }

    public function updateTask($request, $id)
    {
        try {
            $task = $this->model->findOrFail($id);
            $task->update($request['task']);
            $task->subjects()->detach();
            $task->subjects()->attach($request['subject_id'], ['status' => config('config.task.status')]);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return [
            'success' => true,
        ];
    }
}
