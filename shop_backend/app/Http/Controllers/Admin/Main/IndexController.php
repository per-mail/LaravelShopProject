<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['$usersCount'] = User::all()->count();
        $data['$productsCount'] = Product::all()->count();
        $data['$categoriesCount'] = Category::all()->count();
        $data['$tagsCount'] = Tag::all()->count();
// метод view начинает поиск файла с папки view потом идёт папка admin, папка main и файл index, точку между ними пишем вместо слэша
        return view ('admin.main.index', compact('data'));
    }
}
