<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\Courses\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends ApiBaseController
{
    protected $CourseRepo;
    protected $model;

    public function __construct(
        CourseInterface $courseRepository,
        Course $course)
    {
        $this->CourseRepo = $courseRepository;
        $this->model = $course;
    }

    public function index(Request $request)
    {
        $courseList = $this->CourseRepo->getListCourse($request);
        if (!$courseList['success']) {
            return $this->sendError(500, 'ERROR', 500);
        }

        return $this->sendSuccess($courseList['listCourse']);
    }

    public function store(Request $request)
    {
        $fillable = $request->only(['name', 'description', 'is_active', 'category_id']);
        $addCourse = $this->CourseRepo->createCourse($request->only($fillable));
        if (!$addCourse) {
            return $this->sendError(500, 'ERROR', 500);
        }

        return $this->sendSuccess($addCourse['success']);
    }

    public function update(Request $request, $id)
    {
        $fillable = $request->only(['name', 'description', 'is_active', 'category_id']);
        $editCourse = $this->CourseRepo->updateCourse($request->only($fillable), $id);
        if (!$editCourse) {
            return $this->sendError(500, 'ERROR', 500);
        }

        return $this->sendSuccess($editCourse['success']);
    }

    public function destroy($id)
    {
        $this->CourseRepo->deleteCourse($id);
    }
}
