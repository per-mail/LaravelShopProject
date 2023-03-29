<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return new ProductResource($product);
    }
}
