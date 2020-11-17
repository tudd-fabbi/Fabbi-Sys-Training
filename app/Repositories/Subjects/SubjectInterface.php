<?php

namespace App\Repositories\Subjects;

use App\Repositories\BaseRepositoryInterface;

interface SubjectInterface extends BaseRepositoryInterface
{
    public function getListSubject($request);
    public function deleteSubject($id);
    public function createSubject(array $data);
    public function updateSubject(array $data, $id);
    public function getSubjectById($id);
    public function countTaskCourseSubjectById($id);
    public function ListCourseBySubjetID($id);
    public function getAllSubject();
}
