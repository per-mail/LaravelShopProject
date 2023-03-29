<?php

namespace App\Http\Controllers\Admin\Group;


use App\Models\Group;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Group $group)
    {
//  проверяем массив на наличие данных
        $group->delete();
//  начинает поиск файла с папки view потом идёт папка admin папка group, точку между ними пишем вместо слэша
        return redirect()->route('admin.group.index');
    }
}
