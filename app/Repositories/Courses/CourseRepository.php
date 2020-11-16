<?php


namespace App\Repositories\Courses;

use App\Models\Course;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

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
        if (!empty($request['name'])) {
            $listCourse = $listCourse->where('name', 'like', '%' . $request['name'] . '%');
            return [
                'success' => true,
                'listCourse' => $listCourse->paginate($perPage)
            ];
        }

        return [
            'success' => true,
            'listCourse' => $listCourse->paginate($perPage)
        ];


    }

    public function createCourse($data)
    {
        try {
            $addCourse = $this->model->create($data);
            return [
                'success' => true
            ];

        } catch (Exception $e) {
            return [
                'success' => false
            ];
        }
    }

    public function updateCourse(array $data, $id)
    {
        try {
            $courseByID = $this->model->findOrFail($id);
            $courseByID->update($data);
            return [
                'success' => true
            ];

        } catch (Exception $e) {
            return [
                'success' => false
            ];
        }
    }

    public function deleteCourse($id)
    {
        try {
            $courseByID = $this->model->findOrFail($id);
            $courseByID->delete();
            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false
            ];
        }
    }
}
