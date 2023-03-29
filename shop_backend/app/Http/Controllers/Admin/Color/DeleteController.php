<?php

namespace App\Http\Controllers\Admin\Color;


use App\Models\Color;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Color $color)
    {
//проверяем массив на наличие данных
        $color->delete();
        return redirect()->route('admin.color.index');
    }
}
