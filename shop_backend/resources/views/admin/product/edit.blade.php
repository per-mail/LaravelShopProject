@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование товара</h1>
                    </div><!-- /.col -->
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group  w-25">
                                {{--                                name='title': name-берём из базы --}}
                                <input type="text" class="form-control" name="title" placeholder="Наименование товара"
                                       {{--                                       сохраняем текст в заголовке если товар не отправился --}}
                                       value="{{ $product->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="description" placeholder="Описание товара"
                                value="{{ $product->description }}">
                            @error('description')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                {{--                                       сохраняем текст в контенте если товар не отправился --}}
                                <textarea id="summernote" name="content">
                                {{ $product->content }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="price" placeholder="Цена"
                                value="{{ $product->price }}">
                            @error('price')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="price_old" placeholder="Старая цена"
                                value="{{ $product->price_old }}">
                            @error('price_old')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="count" placeholder="Остаток на складе"
                                value="{{ $product->count }}">
                            @error('count')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="w-25 mb-2">
                                    <img src="{{ url('storage/' . $product->preview_image) }}" alt="preview_image"
                                         class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>                            
                                <div class="form-group w-50">
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? ' selected': '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50">
                                    <label>Выберите группу</label>
                                    <select name="group_id" class="form-control">
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}"
                                                {{ $group->id == $product->group_id ? ' selected': '' }}>{{ $group->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" w-50>
                                        <label>Тэги</label>
                                        <select class="select2" name="tag_ids[]" multiple="multiple"
                                                data-placeholder="Выберите тэги" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                {{--    метод pluck собирает id в один файл, toArray() - метод приводит коллекции к массивам --}}
                                                <option
                                                    {{ is_array( $product->tags->pluck('id')->toArray()  ) && in_array($tag->id, $product->tags->pluck('id')->toArray() ) ? ' selected' : '' }} value="{{ $tag->id}}">{{ $tag->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('tag_ids')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group" w-50>
                                        <label>Цвета</label>
                                        <select class="select2" name="color_ids[]" multiple="multiple"
                                                data-placeholder="Выберите цвета" style="width: 100%;">
                                            @foreach($colors as $color)
                                                {{--    метод pluck собирает id в один файл, toArray() - метод приводит коллекции к массивам --}}
                                                <option
                                                    {{ is_array( $product->colors->pluck('id')->toArray()  ) && in_array($color->id, $product->colors->pluck('id')->toArray() ) ? ' selected' : '' }} value="{{ $color->id}}">{{ $color->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('color_ids')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Обновить">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
