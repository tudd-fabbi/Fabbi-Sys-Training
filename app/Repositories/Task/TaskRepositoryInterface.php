<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    public function getTasks($request);

    public function delete($id);

    public function search($key);
}

