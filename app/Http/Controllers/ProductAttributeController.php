<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAttributeRequest;
use App\Services\ProductAttributeService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductAttributeController extends BaseApiController
{
    public function __construct(ProductAttributeService $service)
    {
        $this->service = $service;
    }
    public function store(ProductAttributeRequest $request): JsonResponse
    {
        return $this->storeBase($request);
    }

    public function update(ProductAttributeRequest $request, int $id): JsonResponse
    {
        return $this->updateBase($request, $id);
    }

    public function filter(Request $request)
    {
        $data = $request->all();
        return $this->service->filter($data);
    }
}
