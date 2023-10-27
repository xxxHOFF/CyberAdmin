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
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('users') ? 'text-warning' : 'text-white' }}" role="button" data-bs-toggle="dropdown"
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
            @else
                <button type="button" class="btn btn-warning text-white click-btn" data-bs-target="#modalLoginForm" data-bs-toggle="modal" id="openLoginForm">Вход</button>
            @endauth
        </div>
    </div>
</header>

@yield('content')

<footer class="py-3 text-bg-dark">
    <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="footer-item"><a href="{{ route('index') }}" class="nav-link px-2 text-white">Главная</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Статус</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Товары</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Брони</a></li>
            <li class="footer-item"><a href="#" class="nav-link px-2 text-white">Продажи</a></li>
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

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow text-white">
            <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Вход</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" id="email" name="email" class="form-control rounded-3 text-white {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="E-mail" value="{{old('email')}}" required>
                        <label for="email" class="text-white">E-mail</label>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" name="password" class="form-control rounded-3 text-white {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Пароль" required>
                        <label for="password" class="text-white">Пароль</label>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input name="remember" class="form-check-input" type="checkbox" role="switch" id="rememberMeCheck">
                        <label class="form-check-label" for="rememberMeCheck">Запомнить меня</label>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Вход</button>
                </form>
                <button type="button" class="btn btn-link text-decoration-none px-0" data-bs-target="#modalForgotForm" data-bs-toggle="modal" id="openForgotForm"><small class="text-white setHoverColor">Забыли пароль?</small></button>
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
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" id="register_name" name="register_name" class="form-control rounded-3 text-white {{$errors->has('register_name') ? 'is-invalid' : ''}}" placeholder="" value="{{old('register_name')}}" required>
                        <label for="register_name" class="text-white">Имя пользователя</label>
                        @error('register_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" id="register_email" name="register_email" class="form-control rounded-3 text-white {{$errors->has('register_email') ? 'is-invalid' : ''}}" placeholder="" value="{{old('register_email')}}" required>
                        <label for="register_email" class="text-white">E-mail</label>
                        @error('register_email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" id="register_password" name="register_password" class="form-control rounded-3 text-white {{$errors->has('register_password') ? 'is-invalid' : ''}}" placeholder="" required>
                        <label for="register_password" class="text-white">Придумайте пароль</label>
                        @error('register_password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" id="register_password_confirmation" name="register_password_confirmation" class="form-control rounded-3 text-white {{$errors->has('register_password_confirmation') ? 'is-invalid' : ''}}"  placeholder="" required>
                        <label for="register_password_confirmation" class="text-white">Повторите пароль</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select id="address" name="address" class="form-control text-white {{$errors->has('address') ? 'is-invalid' : ''}}" aria-label="Точка работы" required>
                            <option value="" selected disabled>Выберите адрес</option>
                            <option value="Пл. Максима Горького, 4" {{ old('address') == 'Пл. Максима Горького, 4' ? 'selected' : '' }}>Пл. Максима Горького, 4</option>
                            <option value="Коминтерна, 123" {{ old('address') == 'Коминтерна, 123' ? 'selected' : '' }}>Коминтерна, 123</option>
                            <option value="Мещерский бульвар, 7" {{ old('address') == 'Мещерский бульвар, 7' ? 'selected' : '' }}>Мещерский бульвар, 7</option>
                            <option value="Пр. Ленина, 28" {{ old('address') == 'Пр. Ленина, 28' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                            <option value="Пр.Молодежный, 2Б" {{ old('address') == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                            <option value="Казанское шоссе, 5" {{ old('address') == 'Казанское шоссе, 5' ? 'selected' : '' }}>Казанское шоссе, 5</option>
                            <option value="Пр. Гагарина, 212А" {{ old('address') == 'Пр. Гагарина, 212А' ? 'selected' : '' }}>Пр. Гагарина, 212А</option>
                            <option value="Белинского, 106А" {{ old('address') == 'Белинского, 106А' ? 'selected' : '' }}>Белинского, 106А</option>
                        </select>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-check form-switch mb-4">
                        <input name="remember" class="form-check-input" type="checkbox" role="switch" id="rememberMeCheck">
                        <label class="form-check-label" for="rememberMeCheck">Запомнить меня</label>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
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

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-warning w-100 mt-3 text-white click-btn">Выход</a>
        </form>
    </div>
</div>

<div class="modal fade" id="modalForgotForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow text-white">
            <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Забыли пароль?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="{{route('password.forgot')}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" id="forgot_email" name="forgot_email" class="form-control rounded-3 text-white {{$errors->has('forgot_email') ? 'is-invalid' : ''}}" placeholder="E-mail" value="{{old('forgot_email')}}" required>
                        <label for="forgot_email" class="text-white">E-mail</label>
                        @error('forgot_email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Восстановить</button>
                </form>
                <small class="text-white">На почту будет отправлено письмо<br>с инструкцией по восстановлению.</small>
                <hr class="my-4">
                <h2 class="fs-5 fw-bold mb-3 text-center">Или зарегестрируйтесь</h2>
                <button class="w-100 py-2 mb-2 btn btn-outline-light rounded-3 click-btn" data-bs-target="#modalRegisterForm" data-bs-toggle="modal" id="openRegisterForm">
                    Регистрация
                </button>
            </div>
        </div>
    </div>
</div>

<button data-bs-target="#modalSuccess" data-bs-toggle="modal" id="openSuccessModal" style="display: none"></button>

<div class="modal fade p-4 py-md-5" tabindex="-1" role="dialog" id="modalSuccess">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0 text-white">{{ session('status') }}</h5>
            </div>
            <div class="modal-footer flex-nowrap p-0 justify-content-center">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 text-white setHoverColor" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->has('email') || $errors->has('password'))
        document.getElementById('openLoginForm').click();
        @elseif($errors->has('register_name') || $errors->has('register_email') || $errors->has('register_password') || $errors->has('register_password_confirmation') || $errors->has('address'))
        document.getElementById('openRegisterForm').click();
        @elseif($errors->has('forgot_email'))
        document.getElementById('openForgotForm').click();
        @elseif(session('status'))
        document.getElementById('openSuccessModal').click();
        @endif
    });
</script>

</body>
</html>
