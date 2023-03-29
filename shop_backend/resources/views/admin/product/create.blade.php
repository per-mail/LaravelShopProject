@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление товара</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Товары</a></li>
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
                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group  w-25">
                                {{--                                name='title': name-берём из базы --}}
                                <input type="text" class="form-control" name="title" placeholder="Наименование товара"
                                       value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-group">    
                                <input type="text" class="form-control" name="description" placeholder="Описание товара">
                            @error('description')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>

                            <div class="form-group"> 
                            <div class="form-group">
                                <textarea id="summernote" name="content">
                                {{ old('content') }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-group">    
                                <input type="text" class="form-control" name="price" placeholder="Цена">
                            @error('price')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="price_old" placeholder="Старая цена">
                            @error('price_old')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>
                            <div class="form-group">    
                                <input type="text" class="form-control" name="count" placeholder="Остаток на складе">
                            @error('title')
                              <div class="text-danger">({{ $message }}) </div>
                            @enderror
                            </div>


                           <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>                                   
                                    

                           
                            <div class="form-group w-50">
                                <label>Выберите категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? ' selected': '' }}>{{ $category->title }}</option>
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
                                            {{ $group->id == old('group_id') ? ' selected': '' }}>{{ $group->title }}</option>
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
                                            <option
                                                {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id}}">{{ $tag->title }}</option>
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
                                            <option
                                                {{ is_array( old('color_ids')) && in_array($color->id, old('color_ids')) ? ' selected' : '' }} value="{{ $color->id}}">{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Добавить">
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
