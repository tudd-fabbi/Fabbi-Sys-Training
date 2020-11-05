<?php

namespace App\Repositories\Task;


interface TaskRepositoryInterface
{
    public function getTasks();

    public function delete($id);
}

