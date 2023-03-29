<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Http\Requests\Admin\Color\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//проверяем массив на наличие данных
        $data = $request->validated();

        Color::firstOrCreate($data);
        return redirect()->route('admin.color.index');
    }
}
