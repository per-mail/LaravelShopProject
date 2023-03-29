<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Product\BaseController;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Group;

class CreateController extends BaseController
{
    public function __invoke()
    {
//  помещаем все категории в переменную  $categories
        $categories = Category::all();

        $tags = Tag::all();

        $colors = Color::all();
        $groups = Group::all();

        return view ('admin.product.create', compact('categories', 'tags', 'colors', 'groups'));
    }
}
