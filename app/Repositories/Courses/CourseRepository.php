<?php


namespace App\Repositories\Courses;

use App\Models\Course;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
class CourseRepository extends BaseRepository implements CourseInterface
{
    public function __construct(Course $course)
    {
        $this->model = $course;
    }
    public function getListCourse($request)
    {
        $perPage = $request->perPage;
        $listCourse = $this->model;
        if ($request->has('name')&& $request->name){
            $listCourse = $listCourse->where('name', 'LIKE','%$request->name%');
        }
        return [
            'success'  => true,
            'listCourse' => $listCourse->paginate($perPage)
        ];


    }
    public function createCourse($request)
    {

    }
    public function updateCourse($request)
    {

    }
    public function deleteCourse($id)
    {

    }
}
