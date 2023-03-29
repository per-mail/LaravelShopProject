<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Color $color)
    {
//проверяем массив на наличие данных
        $data = $request->validated();

        $color->update($data);

        return view('admin.color.show', compact('color'));
    }
}
