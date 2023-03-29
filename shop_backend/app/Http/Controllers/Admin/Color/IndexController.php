<?php

namespace App\Http\Controllers\Admin\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $colors = Color::all();

        return view ('admin.color.index', compact('colors'));
    }
}
