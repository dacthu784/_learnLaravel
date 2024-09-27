<?php

namespace App\Repositories;

use App\Models\CartItem;
use App\Repositories\Interfaces\ICartItemRepository;


class CartItemRepository extends BaseRepository implements ICartItemRepository
{
    public function __construct(CartItem $model)
    {
        $this->model = $model;
    }

    public function getCartItem($cardId)
    {
         $user = $this->model->where('cart_id',$cardId)->get();
        return $user;
    }

    public function joinProduct($cart)
    {
       return  $this->model->where('cart_id', $cart->first()->id)
        ->join('products','products.id','=','cart_items.product_id')
        ->select('cart_items.*','products.name as products_name ')->latest()->get();
    }

}
