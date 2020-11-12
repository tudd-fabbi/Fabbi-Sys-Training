<?php

namespace App\Repositories\Subjects;

use App\Models\Subject;

use App\Repositories\BaseRepository;
use App\Repositories\Subjects\SubjectInterface;

/**
 * Class EquipmentRepository
 * @package App\Repositories\Equipment
 */
class SubjectRepon extends BaseRepository implements SubjectInterface
{

    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }

    public function getListSubject($request)
    {
        $list = $this->model;
        if (!empty($request['name'])) {
            return [
                'success' => true,
                'data' => $list->where('name', 'like', '%' . $request['name'] . '%')->paginate($request['perPage'])
            ];
        }

        return [
            'success' => true,
            'data' => $list->paginate($request['perPage'])
        ];
    }

    public function deleteSubject($id)
    {
        try {
            $subject = $this->model->find($id);
            $subject->users()->detach();
            $subject->tasks()->detach();
            $subject->courses()->detach();
            $subject->delete();
            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createSubject(array $data)
    {
        $subject = $this->model->create($data);
        $course_id = $data['course_id'];
        $subject->courses()->attach($course_id, ['status' => 'Create']);
        return [
            'success' => true
        ];
    }

    public function getSubjectById($id)
    {
        try {
            $data = $this->model->findOrFail($id);
            return [
                'data' => $data,
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function countTaskCourseSubjectById($id)
    {
        try {
            $data = $this->model->findOrFail($id);
            $task = $data->tasks()->count('task_id');
            $course = $data->courses()->count('course_id');
            $user = $data->users()->count('user_id');
            $array = [$task, $course, $user];
            return [
                'data' => $array,
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateSubject(array $data, $id)
    {
        try {
            $subject = $this->model->findOrFail($id);
            $subject->update($data);
            $course_id = $data['course_id'];
            $subject->courses()->detach();
            $subject->courses()->attach($course_id, ['status' => 'Update']);
            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function ListCourseBySubjetID($id)
    {
        try {
            $subject = $this->model->findOrFail($id);
            $data = $subject->courses()->get();
            return [
                'data' => $data,
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
