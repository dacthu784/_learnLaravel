<?php

namespace App\Repositories;


use App\Models\ProductImage;
use App\Repositories\Interfaces\IProductImageRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductImageRepository extends BaseRepository implements IProductImageRepository
{
    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

    public function changeMain($id)
    {
        DB::beginTransaction();
        try{
            $product_image = $this->getById($id);
            $original_main = $this->getAll()->where('product_id', $product_image->product_id)
            ->where('main', 1)->first();

            $original_main->main = 0;
            $product_image->main = 1;

            $product_image->save();
            $original_main->save();

            return $product_image;
            DB::commit();

        }
        catch(Exception $e)
        {
            throw $e;
            DB::rollBack();

        }

    }

}
