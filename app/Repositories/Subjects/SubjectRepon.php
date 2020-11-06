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
        //parent::__construct($subject);
        $this->model = $subject;
    }

    public function getListSubject($request)
    {
    //    $searchKey = $request->input('search');
       $list = $this->model;
       if($request->has('name') && $request->name) {
           $list = $list->where('name','LIKE',"%$request->name%");
          

       }

       return [
           'success'  => true,
           'listSubject' => $list->get()
       ];

    }

    public function deleteSubject($id)
    {
        // $this->model->where('id',$id)->delete();
        $subject = Subject::find($id);
        // dd($subject);
        $subject->userSubject()->detach();
        $subject->taskSubject()->detach();
        $subject->subjectCourse()->detach();
        $this->model->where('id',$id)->delete();
        // $this->model->userSubject();
        //$this->model->taskSubject()->where('subject_id',$id)->detach();
      
    }

    public function createSubject($request)
    {
        //$this->model->create($request->all());
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->is_active = $request->is_active;
        $subject->save();
        
        $subject->subjectCourse()->attach($request->value,['status'=>'Chua hoan thanh']);
            
       // }
    }

    

    public function getSubjectById($id)
    {
        $data = $this->model->findOrFail($id);
        $listCourse = $data->subjectCourse()->count('course_id');
        //dd($listCourse);
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
        //dd($subject);
        $subject->name =$request->name;
        $subject->description =$request->description;
        $subject->is_active = true;
        $subject->update();
    }

    public function listCourse($id){
        $subject = $this->model->findOrFail($id);
        $listCourse = $subject->subjectCourse()->get();
        return [
            'data' => $listCourse,
            'success' => true,
        ];
    }

}