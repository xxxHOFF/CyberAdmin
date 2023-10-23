@extends('layout')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/BlogHome1.jpg')}}" class="d-block w-100 full-height" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Сайт предназначен для админов ПК клуба КиберПрайд с целью упрощения и ускорения некоторых задач.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/BlogHome2.jpg')}}" class="d-block w-100 full-height" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Чтобы пользоваться функционалом сайта - необходимо авторизоваться.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/BlogHome3.jpg')}}" class="d-block w-100 full-height" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>За доступом обращайтесь к вашему руководителю.</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
