<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    public function getTasks($request);
    public function createTask($request);
    public function showTask($id);
}

