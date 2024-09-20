<?php

namespace App\Http\Controllers;


use App\Services\CartService;


class CartController extends Controller
{
    private $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }
    public function get()
    {
        $userId = auth()->id();
        $cart = $this->service->getCart($userId);
        return response()->json($cart, 200);
    }


   


}
