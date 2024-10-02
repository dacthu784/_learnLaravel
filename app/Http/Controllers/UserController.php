<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends BaseApiController
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function store(UserRequest $request): JsonResponse
    {
        return $this->storeBase($request);
    }

    public function update(UserEditRequest $request, int $id): JsonResponse
    {
        return $this->updateBase($request, $id);
    }

    public function isAdmin($id)
    {
        $this->service->isAdmin($id);
    }

    public function getSelf()
    {
        $userSelf = $this->service->getSelf();
        return response()->json($userSelf);

    }

    public function updateBySelf(UserEditRequest $request)
    {
        $data = $request->all();
        $userId = $this->service->updateBySelf( $data);
        return $userId;
    }

    public function registerPermission(UserEditRequest $request)
    {
        $data = $request->all();
        $userId = $this->service->updateBySelf($data);
        return $userId;
    }


}
