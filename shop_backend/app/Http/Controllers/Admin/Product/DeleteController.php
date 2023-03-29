<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Product;
use App\Http\Controllers\Admin\Product\BaseController;

class DeleteController extends BaseController
{
    public function __invoke(Product $product)
    {
//  проверяем массив на наличие данных
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
