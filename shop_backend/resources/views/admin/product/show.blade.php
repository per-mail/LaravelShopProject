@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $product->title }}</h1>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a></td>
                        <form action="{{ route('admin.product.delete', $product->id) }}"
                              method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Товары</a></li>
                            <li class="breadcrumb-item active">{{ $product->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Наименование</td>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Описание</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Наименование</td>
                                        <td>{{ $product->content }}</td>
                                    </tr>
                                    <tr>
                                        <td>Цена</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Старая цена</td>
                                        <td>{{ $product->price_old }}</td>
                                    </tr>
                                    <tr>
                                        <td>Остаток на складе</td>
                                        <td>{{ $product->count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Категория</td>
                                        <td>{{ $product->category->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Группа</td>
                                        <td>{{ $product->group->title }}</td>
                                    </tr>                                   
                                    <!-- <tr>
                                        <td>Дата добавления продукта</td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата обновления продукта</td>
                                        <td>{{ $product->updated_at }}</td>
                                    </tr> -->
                                    <tr>
                                        <td>Статус на сайте</td>
                                        <td>{{ $product->is_published }}</td>
                                    </tr>
                                    <tr>
                                        <td>Картинка</td>
                                        <td><section class="blog-post-featured-img" data-aos="fade-up">
                                        <img src="{{ asset('storage/' . $product->preview_image) }}" alt="product image" class="w-100">
                                    </section></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
