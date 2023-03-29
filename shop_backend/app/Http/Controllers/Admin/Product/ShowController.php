<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Http\Controllers\Admin\Product\BaseController;


class ShowController extends BaseController
{
//   переменную category - мы берём из роута '/{category}'
    public function __invoke(Product $product)
    {
        return view ('admin.product.show', compact('product'));
    }
}
