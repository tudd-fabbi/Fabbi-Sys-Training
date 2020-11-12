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
    //protected $subject;

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
        'data' =>$list->paginate($request['perPage'])
    ];

    }

    public function deleteSubject($id)
    {  
        $subject = Subject::find($id);
        $subject->userSubject()->detach();
        $subject->taskSubject()->detach();
        $subject->subjectCourse()->detach();
        $this->model->where('id',$id)->delete(); 
    }

    public function createSubject($request)
    {
        $subject = new Subject();
        $subject->name = 'Huy Duc';
        $subject->description = 'test aaaa';
        $subject->is_active = true;
        $subject->save();
        
        $subject->subjectCourse()->attach([1,2,3],['status'=>'Create']);
    }

    

    public function getSubjectById($id)
    {
        $data = $this->model->findOrFail($id);
        $listCourse = $data->subjectCourse()->count('course_id');
        return [
            'data' => $data,
            'success' => true,
        ];
    }

    public function countTaskById($id)
    {
        $data = $this->model->findOrFail($id);
        $task = $data->taskSubject()->count('task_id');
        return [
            'data' => $task,
            'success' => true,
        ];
    }

    public function countCourseById($id)
    {
        $data = $this->model->findOrFail($id);
        $course = $data->subjectCourse()->count('course_id');
        return [
            'data' => $course,
            'success' => true,
        ];
    }


    public function countUserById($id)
    {
        $data = $this->model->findOrFail($id);
        $user = $data->userSubject()->count('user_id');
        return [
            'data' => $user,
            'success' => true,
        ];
    }

    public function updateSubject($request){
        $subject = $this->model->findOrFail($request->id);
        $subject->name =$request->name;
        $subject->description =$request->description;
        $subject->is_active = true;
        $subject->update();
        $subject->subjectCourse()->detach();
        $subject->subjectCourse()->attach($request->value,['status'=>'Update']);
    }

    public function listCourse($id){
        $subject = $this->model->findOrFail($id);
        $listCourse = $subject->subjectCourse()->get();
        return $listCourse;
    }

}