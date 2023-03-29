<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use \App\Http\Controllers\Admin\Product\BaseController;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $products = Product::all();
        return view ('admin.product.index', compact('products'));
       
    }
}
