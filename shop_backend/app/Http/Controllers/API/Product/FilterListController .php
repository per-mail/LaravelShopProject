<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;
use App\Http\Resources\Product\ProductResource;
use App\Http\Controllers\Controller;

class FilterListController extends Controller
{
    public function __invoke(Product $product)
    {
        $categories = Category::all();

        $tags = Tag::all();

        $colors = Color::all();       
     

        $maxPrice = Product::orderBy('price', 'DESK')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
            'categories' => $categories,
            'colors' => $colorss,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ],
        ];
        return response()->json($result);
    }
}
