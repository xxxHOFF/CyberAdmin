@extends('layout')

@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-white">403</h1>
            <p class="fs-3 text-white"> <span class="text-danger">Ой!</span> Доступ запрещен.</p>
            <p class="lead text-white">
                У вас нет доступа к этому ресурсу.
            </p>
            <a href="{{route('index')}}" class="btn btn-warning click-btn text-white">На главную</a>
        </div>
    </div>
@endsection
