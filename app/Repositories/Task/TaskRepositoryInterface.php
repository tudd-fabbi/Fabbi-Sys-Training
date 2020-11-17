<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    public function getTasks($request);
    public function createTask($request);
    public function showTask($id);
    public function deleteTask($id);
    public function updateTask($request, $id);
    public function getSubjectOfTask($id);
}

