<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Http\Requests\Admin\Group\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
        Group::firstOrCreate($data);
//  начинает поиск файла с папки view потом идёт папка admin папка group, точку между ними пишем вместо слэша
        return redirect()->route('admin.group.index');
    }
}
