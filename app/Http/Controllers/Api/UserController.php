<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiBaseController;
class UserController extends ApiBaseController
{
    protected $repository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $data = $this->repository->getListUser($request);
        if (!$data['success']) {
            return $this->sendError(500,"Error","Failed");
        }

        return $this->sendSuccess($data['listUser']);
    }
}
