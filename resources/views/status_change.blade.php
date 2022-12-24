@extends('layouts.base')

@section('title', 'Ответить на запрос')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ответить на запрос</div>
                <div class="card-body">
                    <form action="{{ route('status.save', ['usage' => $usage->id]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" name="status" aria-label="Default select example">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-primary mt-2" value="Подтвердить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection