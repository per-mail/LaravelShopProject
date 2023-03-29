<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'count' => '',
            'price_old' => '', 
            'price' => '',                
//   'required|integer|exists: categories,id' проверка, что в базе данных в таблице categories есть id которому равен category_id
            'category_id' => '',
            'group_id' => '',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'color_ids' => 'nullable|array',
            'color_ids.*' => 'nullable|integer|exists:tags,id',            
        ];
    }
}
