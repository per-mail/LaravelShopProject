<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];


//  оптимизируем код уменьшаем количество запросов к бд, посты будут приходть из базы вместе c категориями, не нужно делать отдельные запросы по постам и категориям
    protected $with = ['category'];

//  отношение многие ко многим
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id',);
    }
//  отношение многие ко многим
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id',);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    
    
// добавляем картинку к отправляемым на сайт файлам
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->preview_image);
    }



}