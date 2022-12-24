@extends('layouts.base')

@section('title', 'Добавить оборудование')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить оборудование</div>
                    <div class="card-body">
                        <form action="{{ route('device.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="txtTitle">Наименование</label>
                                <input type="text" name="name" id="txtTitle" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Категория</label>
                                <select class="form-select @error('category') is-invalid @enderror" name="category" aria-label="Default select example">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Описание</label>
                                <input type="text" name="description" id="txtTitle" class="form-control @error('description') is-invalid @enderror">
                                @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Количество</label>
                                <input type="number" name="number" id="txtTitle" class="form-control @error('number') is-invalid @enderror">
                                @error('number')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtTitle">Изображение</label>
                                <input type="file" name="image" id="image" value="default.jpg" class="form-control @error('image') is-invalid @enderror" enctype="multipart/form-data">
                                @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-warning mt-3" value="Добавить">
                            <a href="{{ route('admin') }}" class="btn btn-danger mt-3">Вернуться</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection