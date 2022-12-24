@extends('layouts.base')

@section('title', 'Списать оборудование')

@section('content')
    <div class="container-xxl d-flex justify-content-evenly my-5 booking text-warning">
        <img class="card-img-top img-fluid booking-image" src="../../storage/uploads/{{$device->image}}">
        <div class="ml-3">
            <h5 class="card-title">{{$device->name}}</h5>
            <p class="card-text text-secondary">Категория: {{$device->category->name}}</p>
            <p class="card-text">{{$device->description}}</p>
            <p class="card-text text-primary fs-4">Всего: {{$device->number}}</p>
            <form action="{{ route('device.destroy', ['device' => $device->id]) }}" method="post">
                @csrf
                <div class="my-4">
                    <input type="submit" value="Удалить" class="btn btn-warning">
                    <a href="{{ route('admin') }}" class="btn btn-danger">Вернуться</a>
                </div>
            </form>
        </div>
    </div>
@endsection