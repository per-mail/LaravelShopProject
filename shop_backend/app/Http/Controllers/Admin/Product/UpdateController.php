<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use App\Http\Controllers\Admin\Product\BaseController;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  через this и родительский класс BaseController вызываем метод store() из ProductService
//  и получаем новую переменную $post
        $product = $this->service->update($data, $product);

        return view('admin.product.show', compact('product'));
    }
}
