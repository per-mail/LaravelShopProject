<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=> 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace'=> 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.main.index');
        });

    Route::group(['namespace'=> 'Product', 'prefix' => 'products'], function () {
        Route::get('/', 'IndexController')->name('admin.product.index');
        Route::get('/create', 'CreateController')->name('admin.product.create');
        Route::post('/', 'StoreController')->name('admin.product.store');
        Route::get('/{product}', 'ShowController')->name('admin.product.show');
        Route::get('/{product}/edit', 'EditController')->name('admin.product.edit');
        Route::patch('/{product}', 'UpdateController')->name('admin.product.update');
        Route::delete('/{product}', 'DeleteController')->name('admin.product.delete');

    });

    Route::group(['namespace'=> 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace'=> 'Group', 'prefix' => 'groups'], function () {
        Route::get('/', 'IndexController')->name('admin.group.index');
        Route::get('/create', 'CreateController')->name('admin.group.create');
        Route::post('/', 'StoreController')->name('admin.group.store');
        Route::get('/{group}', 'ShowController')->name('admin.group.show');
        Route::get('/{group}/edit', 'EditController')->name('admin.group.edit');
        Route::patch('/{group}', 'UpdateController')->name('admin.group.update');
        Route::delete('/{group}', 'DeleteController')->name('admin.group.delete');

    });

    Route::group(['namespace'=> 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace'=> 'Color', 'prefix' => 'colors'], function () {
        Route::get('/', 'IndexController')->name('admin.color.index');
        Route::get('/create', 'CreateController')->name('admin.color.create');
        Route::post('/', 'StoreController')->name('admin.color.store');
        Route::get('/{color}', 'ShowController')->name('admin.color.show');
        Route::get('/{color}/edit', 'EditController')->name('admin.color.edit');
        Route::patch('/{color}', 'UpdateController')->name('admin.color.update');
        Route::delete('/{color}', 'DeleteController')->name('admin.color.delete');

    });

    Route::group(['namespace'=> 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

});

Auth::routes();
//  отправка письма пользователю при регистрации
//Auth::routes(['verify' => true]);

