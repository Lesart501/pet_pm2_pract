@extends('layouts.base')

@section('title', 'Инвентаризация')

@section('content')
    <div class="container">
        <a href="{{ route('device.add') }}" class="btn btn-warning m-5">+ Добавить оборудование</a>
    </div>

    <section class="tours text-center mb-5">
        <div class="container d-flex justify-content-center">
            <div class="row row-cols-3 gap-3 d-flex justify-content-center">
                @foreach($devices as $device)
                    <div class="card col p-0" style="width: 20rem;">
                        <img class="card-img-top" src="storage/uploads/{{$device->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$device->name}}</h5>
                            <p class="card-text text-secondary">Категория: {{$device->category->name}}</p>
                            <p class="card-text">{{$device->description}}</p>
                            <p class="card-text text-primary fs-4">Всего: {{$device->number}}</p>
                            <a href="{{ route('device.edit', ['device' => $device->id]) }}" class="btn btn-warning">Редактировать</a>
                            <a href="{{ route('device.delete', ['device' => $device->id]) }}" class="btn btn-danger">Списать</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection