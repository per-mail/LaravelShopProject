<?php

namespace App\Http\Controllers\Admin\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
//переменную color - мы берём из роута '/{color}'
    public function __invoke(Color $color)
    {

        return view ('admin.color.show', compact('color'));
    }
}
