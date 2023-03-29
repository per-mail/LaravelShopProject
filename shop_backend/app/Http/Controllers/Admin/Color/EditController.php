<?php

namespace App\Http\Controllers\Admin\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;


class EditController extends Controller
{
    public function __invoke(Color $color)
    {
        return view ('admin.color.edit', compact('color'));
    }
}
