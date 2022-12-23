@extends('layouts.base')

@section('title', 'Главная')

@section('content')
    <section class="pic_sec">
        <div class="home_pic">
            <div class="bg-dark rounded p-3 pic_text text-warning">
                <h2>Рабочий сайт Proletarian</h2>
                <p>Управление и учёт техники предприятия</p>
            </div>
        </div>
    </section>
    <section class="tours text-center py-5">
        <h3 class="mb-5 text-warning">Техника в наличии</h3>
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
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">Использовать</a>
                            @endguest
                            @auth
                            <a href="{{ route('book.form', ['tour' => $tour->id]) }}" class="btn btn-primary">Использовать</a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection