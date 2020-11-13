<?php

namespace App\Repositories\Subjects;

use App\Repositories\BaseRepositoryInterface;

interface SubjectInterface extends BaseRepositoryInterface
{
    public function getListSubject($request);
    public function deleteSubject($id);
    public function createSubject($request);
    public function updateSubject($request);
    public function getSubjectById($id);
    public function countTaskById($id);
    public function countCourseById($id);
    public function countUserById($id);
    public function listCourse($id);
}