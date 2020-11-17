<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\Users\UserRepositoryInterface;
use App\Http\Controllers\Api\ApiBaseController;

class UserController extends ApiBaseController
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository){
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $inputData = $request->only('search', 'perPage');
      $data = $this->repository->getListUser($inputData);
      if (!$data['success']) {
          return $this->sendError(500, "Error", "Failed");
      }

      return $this->sendSuccess($data['listUser']);
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
        $inputData = $request->only(
            'name',
            'birthday',
            'phone',
            'address',
            'email',
            'password',
            'course',
            'img_path'
        );

        $data = $this->repository->addUser($inputData);
        if ($data['success']) {
            return $this->sendError(500, "Error", "Failed");
        }

        return $this->sendSuccess('Add User Success');
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
