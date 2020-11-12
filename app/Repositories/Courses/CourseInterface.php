<?php


namespace App\Repositories\Courses;


interface CourseInterface
{
    public function getListCourse($request);
    public function deleteCourse($id);
    public function createCourse($request);
    public function updateCourse($request);
}
