@extends('layouts.base')

@section('title', 'Запросы на использование техники')

@section('content')
    <div class="container text-center my-5">
        <h2 class="text-warning">Запросы на использование техники</h2>
        <div class="table-responsive">
            <table class="table table-warning table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">Дата</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Рабочий</th>
                        <th scope="col">Оборудование</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Всего</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Дней</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usages as $usage)
                        <tr>
                            <th scope="row">{{ $usage->created_at }}</th>
                            <td><a href="{{ route('status.change', ['usage' => $usage->id]) }}">{{ $usage->status->name }}</a></td>
                            <td>{{ $usage->user->id }}</td>
                            <td>{{ $usage->device->name }}</td>
                            <td>{{ $usage->device->category->name }}</td>
                            <td>{{ $usage->device->number }}</td>
                            <td>{{ $usage->number }}</td>
                            <td>{{ $usage->days }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection