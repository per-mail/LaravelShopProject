<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Product\BaseController;
use App\Models\Product;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {        
//  проверяем массив на наличие данных
        $data = $request->validated();

        //  через this и родительский класс BaseController вызываем метод store() из ProductService
        $this->service->store($data);

        return redirect()->route('admin.product.index');
    }
}
