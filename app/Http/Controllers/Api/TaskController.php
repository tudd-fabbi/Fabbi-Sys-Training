<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskRepository->getTasks($request);
        if (!$tasks['success']) {
            return $this->sendError(500, "ERROR", "500");
        }
        return $this->sendSuccess($tasks['data']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(
            [
                'subject_id',
                'task'
            ]
        );
        $task = $this->taskRepository->createTask($data);
        if (!$task['success']) {
            return $this->sendError(500, $task['message'], 'failed');
        }

        return $this->sendSuccess(null, 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->showTask($id);
        if (!$task['success']) {
            return $this->sendError(500, $task['message'], 'failed');
        }

        return $this->sendSuccess($task['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(
            [
                'subject_id',
                'task'
            ]
        );
        $task = $this->taskRepository->updateTask($data, $id);
        if (!$task['success']) {
            return $this->sendError(500, $task['message'], 'failed');
        }

        return $this->sendSuccess(null, "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = $this->taskRepository->deleteTask($id);
        if (!$task['success']) {
            return $this->sendError(500, $task['message'], 'failed');
        }

        return $this->sendSuccess(null, 'Xóa thành công');
    }
}
