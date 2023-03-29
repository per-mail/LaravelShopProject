<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Admin\Product\BaseController;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Group;

class EditController extends BaseController
{
    public function __invoke(Product $product)
    {
        //  помещаем все категории в переменную  $categories
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $groups = Group::all();

        return view ('admin.product.edit', compact('product', 'categories', 'tags', 'colors', 'groups'));
    }
}
