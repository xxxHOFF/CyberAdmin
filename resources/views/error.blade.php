<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}}</title>
    <link rel="icon" href="{{ asset('images/CyberLogo.png') }}" type="image/png">
</head>
<body>
<header class="p-3 text-bg-dark fixed-top">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{asset('images/CyberLogo.png')}}" alt="Логотип CyberAdmin" style="max-width: 50px;">
                <h1 class="m-0">CyberAdmin</h1>
                <ul class="nav col-12 col-lg-auto mb-md-0 header-menu">
                    <li class="header-item"><a href="{{ route('index') }}" class="nav-link px-2 text-white">Главная</a></li>
                    <li class="header-item"><a href="{{ route('status') }}" class="nav-link px-2 text-white">Статус</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            БД
                        </a>
                        <ul class="dropdown-menu text-bg-dark">
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('products') }}">Товары</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('reservations') }}">Брони</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('sales') }}">Продажи</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('rents') }}">Аренды</a></li>
                            <li>
                                <hr class="dropdown-divider bg-white">
                            </li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('users') }}">Пользователи</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('telescope') }}">Телескоп</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @auth
                <div class="align-items-center text-center">
                    <span class="mr-2">Привет,</span>
                    <br>
                    <button class="btn btn-outline-warning" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#openProfile" aria-controls="openProfile">{{ auth()->user()->name }}</button>
                </div>
            @endauth
        </div>
    </div>
</header>

    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-white">{{ $statusCode }}</h1>
            <p class="fs-3 text-white"> <span class="text-danger">Ой!</span> {{ $message }}</p>
            <p class="lead text-white">
                {{ $description }}
            </p>
            <a href="{{route('index')}}" class="btn btn-warning click-btn text-white">На главную</a>
        </div>
    </div>

<footer class="py-3 text-bg-dark">
    <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="footer-item"><a href="{{ route('index') }}" class="nav-link px-2 text-white">Главная</a></li>
            <li class="footer-item"><a href="{{ route('status') }}" class="nav-link px-2 text-white">Статус</a></li>
            <li class="footer-item"><a href="{{ route('products') }}" class="nav-link px-2 text-white">Товары</a></li>
            <li class="footer-item"><a href="{{ route('reservations') }}" class="nav-link px-2 text-white">Брони</a></li>
            <li class="footer-item"><a href="{{ route('sales') }}" class="nav-link px-2 text-white">Продажи</a></li>
            <li class="footer-item"><a href="{{ route('rents') }}" class="nav-link px-2 text-white">Аренды</a></li>
            <li class="footer-item"><a href="{{ route('users') }}" class="nav-link px-2 text-white">Пользователи</a></li>
            <li class="footer-item"><a href="{{ route('telescope') }}" class="nav-link px-2 text-white">Телескоп</a></li>
        </ul>
        <p class="text-center text-white">&copy; {{ date('Y') . ' ' . env('APP_NAME') }}</p>
    </div>
</footer>

<div id="scrollToTopButton">
    <a href="#" class="text-white">
        <i class="bi bi-arrow-up larger-icon"></i>
    </a>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="openProfile" aria-labelledby="profileLabel">
    <div class="offcanvas-header bg-warning">
        <h5 class="offcanvas-title" id="profileLabel">Данные аккаунта</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="userInfoContainer">
        <ul class="list-group">
            <li class="list-group-item text-white">Логин: <span id="userInfo_name"></span></li>
            <li class="list-group-item text-white">E-mail: <span id="userInfo_email"></span></li>
            <li class="list-group-item text-white">Точка работы: <span id="userInfo_address"></span></li>
            <li class="list-group-item text-white">Уровень доступа: <span id="userInfo_level"></span></li>
            <li class="list-group-item text-white">Дата создания: <span id="userInfo_createdAt"></span></li>
        </ul>
    </div>
</div>

</body>
</html>
