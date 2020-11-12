<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Courses\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends ApiBaseController
{
    protected $CourseRepo;
    public function __construct(CourseInterface $courseRepository)
    {
        $this->CourseRepo = $courseRepository;
    }

    public function index(Request $request){
        $courseList = $this->CourseRepo->getListCourse($request);
        if (!$courseList['success']) {
            return $this->sendError(500, 'ERROR', 500);
        }

        return $this->sendSuccess($courseList['listCourse']);
    }
    public function store(Request $request){
        $this->CourseRepo->createCourse($request);
    }
}
