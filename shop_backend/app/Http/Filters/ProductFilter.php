<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const PRICE = 'price';
    public const TAGS = 'tags';
    public const COLORS = 'colors';
    public const CATEGORIES = 'categories';


    protected function getCallbacks(): array
    {
        return [
            self::PRICE => [$this, 'price'],
            self::TAGS => [$this, 'tags'],
            self::COLORS => [$this, 'colors'],
            self::CATEGORIES => [$this, 'categories'],
        ];
    }

    public function price(Builder $builder, $value)
    {
        $builder->whereBetween($value['from'], $value['to']);
    }

    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);        
    });
   
    }

    public function colors(Builder $builder, $value)
    {
        $builder->whereIn('color_id', 'like', "%{$value}%");
    }

    public function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }
}
