<?php

namespace App\Http\Controllers;

use App\Services\OrderService;


class OrderController extends BaseApiController
{

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
        $item = $this->showAuthenticated($id);

        return response()->json($item);
    }


}
