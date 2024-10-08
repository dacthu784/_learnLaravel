<?php

namespace App\Repositories\Interfaces;

interface ICartItemRepository
{
    public function getAllForUser($userId);
    public function getByIdForUser($id, $userId);
    public function create(array $dataDetails);
    public function updateForUser($id, array $newDetails, $userId);
    public function deleteForUser($id, $userId);
    public function getCartItem($cartId);
}
