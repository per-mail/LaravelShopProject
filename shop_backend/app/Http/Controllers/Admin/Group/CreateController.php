<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke()    {

        return view ('admin.group.create');
    }
}
