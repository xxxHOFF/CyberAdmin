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
                    <li class="header-item"><a href="{{ route('index') }}" class="nav-link px-2 {{ request()->routeIs('index') ? 'text-warning' : 'text-white' }}">Главная</a></li>
                    <li class="header-item"><a href="#" class="nav-link px-2 text-white">Статус</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            БД
                        </a>
                        <ul class="dropdown-menu text-bg-dark">
                            <li><a class="dropdown-item text-white text-bg-dark" href="#">Товары</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="#">Брони</a></li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="#">Продажи</a></li>
                            <li>
                                <hr class="dropdown-divider bg-white">
                            </li>
                            <li><a class="dropdown-item text-white text-bg-dark" href="#">Админы</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @auth
                <div class="align-items-center text-center">
                    <span class="mr-2">Привет,</span>
                    <br>
                    <button type="button" class="btn btn-outline-warning">{{ auth()->user()->name }}</button>
                </div>
            @else
                <button type="button" class="btn btn-warning text-white click-btn" data-bs-target="#modalLoginForm" data-bs-toggle="modal">Войти</button>
            @endauth
        </div>
    </div>
</header>

@yield('content')

<footer class="py-3 text-bg-dark">
    <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Главная</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Статус</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Товары</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Брони</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Продажи</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Админы</a></li>
        </ul>
        <p class="text-center text-white">&copy; {{ date('Y') . ' ' . env('APP_NAME') }}</p>
    </div>
</footer>
<div id="scrollToTopButton">
    <a href="#" class="text-white">
        <i class="bi bi-arrow-up larger-icon"></i>
    </a>
</div>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow text-white">
            <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Вход</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="" novalidate>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3 text-white" id="floatingLogin" placeholder="Логин">
                        <label for="floatingLogin" class="text-white">Логин</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3 text-white" id="floatingPassword" placeholder="Пароль">
                        <label for="floatingPassword" class="text-white">Пароль</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Войти</button>
                </form>
                <small class="text-white" href="#">Забыли пароль?</small>
                <hr class="my-4">
                <h2 class="fs-5 fw-bold mb-3 text-center">Или зарегестрируйтесь</h2>
                <button class="w-100 py-2 mb-2 btn btn-outline-light rounded-3 click-btn" data-bs-target="#modalRegisterForm" data-bs-toggle="modal" id="openRegisterForm">
                    Регистрация
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow text-white">
            <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                @if ($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('openRegisterForm').click();
                        });
                    </script>
                @endif
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" id="name" name="name" class="form-control rounded-3 text-white {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="" value="{{old('name')}}" required>
                        <label for="name" class="text-white">Придумайте логин</label>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" id="email" name="email" class="form-control rounded-3 text-white {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="" value="{{old('email')}}" required>
                        <label for="email" class="text-white">E-mail</label>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" id="password" name="password" class="form-control rounded-3 text-white {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="" required>
                        <label for="password" class="text-white">Придумайте пароль</label>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-3 text-white {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"  placeholder="" required>
                        <label for="password_confirmation" class="text-white">Повторите пароль</label>
                        @error('password_confirmation')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <select id="address" name="address" class="form-control text-white {{$errors->has('address') ? 'is-invalid' : ''}}" aria-label="Точка работы" required>
                            <option value="" selected disabled>Выберите точку работы</option>
                            <option value="Пл. Максима Горького, 4">Пл. Максима Горького, 4</option>
                            <option value="Коминтерна, 123">Коминтерна, 123</option>
                            <option value="Мещерский бульвар, 7">Мещерский бульвар, 7</option>
                            <option value="Пр. Ленина, 28">Пр. Ленина, 28</option>
                            <option value="Пр.Молодежный, 2Б">Пр. Ленина, 28</option>
                            <option value="Казанское шоссе, 5">Казанское шоссе, 5</option>
                            <option value="Пр. Гагарина, 212А">Пр. Гагарина, 212А</option>
                            <option value="Белинского, 106А">Белинского, 106А</option>
                        </select>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
