<?php

namespace App\Http\Controllers\Admin\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $groups = Group::all();
// метод view начинает поиск файла с папки view потом идёт папка admin папка group и файл index, точку между ними пишем вместо слэша
        return view ('admin.group.index', compact('groups'));
    }
}
