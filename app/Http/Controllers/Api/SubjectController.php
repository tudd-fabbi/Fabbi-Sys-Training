<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Subjects\SubjectInterface;
use Illuminate\Http\Request;

class SubjectController extends ApiBaseController
{
    protected $repository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(SubjectInterface $repository){
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        // dd("Khanh");
        // dd($request->input('search'));
        //dd($request->all());
        $data = $this->repository->getListSubject($request);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['listSubject']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->repository->createSubject($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->repository->updateSubject($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->repository->deleteSubject($id);
        
    }

    public function getSubjectById($id)
    {
        $data = $this->repository->getSubjectById($id);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['data']);
    }

    public function countTaskById($id)
    {
        $data = $this->repository->countTaskById($id);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['data']);
    }
    public function countCourseById($id)
    {
        $data = $this->repository->countCourseById($id);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['data']);
    }
    public function countUserById($id)
    {
        $data = $this->repository->countUserById($id);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['data']);
    }

    public function listCourse($id)
    {
        $data = $this->repository->listCourse($id);
        if (!$data['success']) {
            return $this->sendError(500);
        }

        return $this->sendSuccess($data['data']);

    }
}