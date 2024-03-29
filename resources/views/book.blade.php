@extends('layouts.base')

@section('title', 'Заявка на использование')

@section('content')
    <div class="container-xxl d-flex justify-content-evenly my-5 booking text-warning">
        <img class="card-img-top img-fluid booking-image" src="../../storage/uploads/{{$device->image}}">
        <div class="ml-3">
            <h5 class="card-title">{{$device->name}}</h5>
            <p class="card-text text-secondary">Категория: {{$device->category->name}}</p>
            <p class="card-text">{{$device->description}}</p>
            <form action="{{ route('book', ['device' => $device->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    В наличии: <input type="number" readonly name="ammount" value="{{$device->number}}" id="txtTitle" class="text-warning bg-dark border-0 @error('ammount') is-invalid @enderror">
                    @error('ammount')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="txtTitle">Необходимое количество</label>
                    <input type="number" name="number" id="txtTitle" class="form-control @error('number') is-invalid @enderror">
                    @error('number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="txtTitle">Рабочих дней</label>
                    <input type="number" name="days" id="txtTitle" class="form-control @error('days') is-invalid @enderror">
                    @error('days')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <input type="submit" value="Забронировать" class="btn btn-warning">
                    <a href="{{ route('index') }}" class="btn btn-danger">Вернуться</a>
                </div>
            </form>
        </div>
    </div>
@endsection