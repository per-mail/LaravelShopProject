<?php

namespace App\Service;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store($data)
    {
        try {
//  транзакция
            Db::beginTransaction();

//  делаем проверку на наличие файла tag_ids в $data
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
//  удаляем массив
                unset($data['tag_ids']);
            }

//  делаем проверку на наличие файла color_ids в $data
            if (isset($data['color_ids'])) {
                $tagIds = $data['color_ids'];
//  удаляем массив
                unset($data['color_ids']);
            }

//  перемещаем изображения в Storage, и создаём файл-путь до него для базы данных
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
            $product = Product::firstOrCreate($data);

//  делаем проверку на наличие файла tag_ids
            if (isset($tagIds)) {
                $product->tags()->attach($tagIds);
            }

//  делаем проверку на наличие файла color_ids
            if (isset($colorIds)) {
                $product->colors()->attach($colorIds);
            }

// если транзакция прошла успешно делаем коммит
            DB::commit();
        } catch (Exception $exception) {
// если транзакция прошла не успешно делаем ролбэк
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $product)
    {
        try {
//  транзакция
             Db::beginTransaction();

//  делаем проверку на наличие файла tag_ids в $data
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
//  удаляем массив
                unset($data['tag_ids']);
            }

//  делаем проверку на наличие файла color_ids в $data
            if (isset($data['color_ids'])) {
                $tagIds = $data['color_ids'];
//  удаляем массив
                unset($data['color_ids']);
            }

//  делаем проверку на наличие файла preview_image в $data
            if (isset($data['preview_image'])) {
//  перемещаем изображения в Storage, и создаём файл-путь до него для базы данных
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }


//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
            $product->update($data);

//  делаем проверку на наличие файла tag_ids
            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }

//  делаем проверку на наличие файла color_ids
            if (isset($colorIds)) {
                $product->colors()->attach($colorIds);
            }


// если транзакция прошла успешно делаем коммит
           DB::commit();
        } catch (Exception $exception) {
// если транзакция прошла не успешно делаем ролбэк
            DB::rollBack();
            abort(500);
    }
        return $product;
    }
}
