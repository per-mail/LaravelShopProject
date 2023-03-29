<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Requests\Admin\Group\StoreRequest;
use App\Models\Group;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Group $group)
    {
// проверяем массив на наличие данных
        $data = $request->validated();

        $group->update($data);

//  начинает поиск файла с папки view потом идёт папка admin папка group, точку между ними пишем вместо слэша
        return view('admin.group.show', compact('group'));
    }
}
