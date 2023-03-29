<?php

namespace App\Http\Controllers\Admin\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
//   переменную group - мы берём из роута '/{group}'
    public function __invoke(Group $group)
    {
//  метод view начинает поиск файла с папки view потом идёт папка admin папка group и файл show, точку между ними пишем вместо слэша
        return view ('admin.group.show', compact('group'));
    }
}
