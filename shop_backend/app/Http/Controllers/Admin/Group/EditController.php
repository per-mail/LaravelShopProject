<?php

namespace App\Http\Controllers\Admin\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Group $group)
    {
// метод view начинает поиск файла с папки view потом идёт папка admin папка group и файл edit, точку между ними пишем вместо слэша
        return view ('admin.group.edit', compact('group'));
    }
}
