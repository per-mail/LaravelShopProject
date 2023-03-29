<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        return IndexProductResource::collection($products);
    }
}
