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
                    <li class="header-item"><a href="{{ route('status') }}" class="nav-link px-2 {{ request()->routeIs('status') ? 'text-warning' : 'text-white' }}">Статус</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('users', 'products', 'reservations', 'sales', 'rents') ? 'text-warning' : 'text-white' }}" role="button" data-bs-toggle="dropdown"
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
                            <li><a class="dropdown-item text-white text-bg-dark" href="{{ route('telescope') }}" target="_blank">Телескоп</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @auth
                <div class="align-items-center text-center">
                    @if(auth()->user()->level > 0)
                    <button class="btn btn-outline-warning btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#openSale" aria-controls="openSale" id="openSaleOffcanvas"><i class="bi bi-bag-plus"></i></button>
                    <button class="btn btn-outline-warning btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#openRent" aria-controls="openRent" id="openRentOffcanvas"><i class="bi bi-pc-display-horizontal"></i></button>
                    <button class="btn btn-outline-warning btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#openReservation" aria-controls="openReservation" id="openReservationOffcanvas"><i class="bi bi-calendar-date"></i></button>
                    @endif
                </div>
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
            <li class="footer-item"><a href="{{ route('status') }}" class="nav-link px-2 text-white">Статус</a></li>
            <li class="footer-item"><a href="{{ route('products') }}" class="nav-link px-2 text-white">Товары</a></li>
            <li class="footer-item"><a href="{{ route('reservations') }}" class="nav-link px-2 text-white">Брони</a></li>
            <li class="footer-item"><a href="{{ route('sales') }}" class="nav-link px-2 text-white">Продажи</a></li>
            <li class="footer-item"><a href="{{ route('rents') }}" class="nav-link px-2 text-white">Аренды</a></li>
            <li class="footer-item"><a href="{{ route('users') }}" class="nav-link px-2 text-white">Пользователи</a></li>
            <li class="footer-item"><a href="{{ route('telescope') }}" class="nav-link px-2 text-white" target="_blank">Телескоп</a></li>
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
                            <option value="Пр.Молодежный, 2Б" {{ old('address') == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр.Молодежный, 2Б</option>
                            <option value="пр. Октября, 25" {{ old('address') == 'пр. Октября, 25' ? 'selected' : '' }}>пр. Октября, 25</option>
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
            <li class="list-group-item text-white">Имя: <span class="text-warning" id="userInfo_name"></span></li>
            <li class="list-group-item text-white">E-mail: <span class="text-warning" id="userInfo_email"></span></li>
            <li class="list-group-item text-white">Адрес: <span class="text-warning" id="userInfo_address"></span></li>
            <li class="list-group-item text-white">Уровень доступа: <span class="text-warning" id="userInfo_level"></span></li>
            <li class="list-group-item text-white">Дата создания: <span class="text-warning" id="userInfo_createdAt"></span></li>
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

<button data-bs-target="#modalStatus" data-bs-toggle="modal" id="openStatusModal" style="display: none"></button>

<div class="modal fade p-4 py-md-5" tabindex="-1" role="dialog" id="modalStatus">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                @if(session('status_success'))
                    <div class="modal-success-animation">
                    <i class="bi bi-check-circle text-white"></i>
                    </div>
                    <h5 class="mb-0 mt-3 text-white">{{ session('status_success') }}</h5>
                @elseif(session('status_fail'))
                    <div class="modal-fail-animation">
                        <i class="bi bi-x-circle text-white"></i>
                    </div>
                    <h5 class="mb-0 mt-3 text-white">{{ session('status_fail') }}</h5>
                @endif
            </div>
            <div class="modal-footer flex-nowrap p-0 justify-content-center">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 text-white setHoverColor" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="openSale" aria-labelledby="saleLabel">
    <div class="offcanvas-header bg-warning">
        <h5 class="offcanvas-title" id="saleLabel">Создание продажи</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="saleContainer">
        <form id="saleForm" action="{{ route('sales.store') }}" method="POST">
            @csrf
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach ($products as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center text-white product-list" data-price="{{ $product->price }}">
                        <h6 class="product-name">{{ $product->name }}</h6><span class="text-warning ">{{ $product->price }}</span>
                        <div class="btn-group d-block">
                            <button class="btn btn-outline-warning btn-icon" id="decrement_{{ $product->id }}" onclick="event.preventDefault();"><i class="bi bi-dash"></i></button>
                            <span id="product_qty_{{ $product->id }}" class="product-quantity text-white btn-icon" data-quantity="0">0</span>
                            <button class="btn btn-outline-warning btn-icon" id="increment_{{ $product->id }}" onclick="event.preventDefault();"><i class="bi bi-plus"></i></button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="form-floating mb-4 mt-4">
            <input type="text" id="sale_details" name="sale_details" class="form-control rounded-3 text-white" placeholder="">
            <label for="sale_details" class="text-white">Детали</label>
        </div>
        <div class="sale-methodRadio">
            <div class="form-check form-check-inline">
                <input class="form-check-input {{$errors->has('sale_method') ? 'is-invalid' : ''}}" type="radio" name="sale_method" id="sale_methodRadio1" value="1">
                <label class="form-check-label text-white" for="sale_methodRadio1">Наличный</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input {{$errors->has('sale_method') ? 'is-invalid' : ''}}" type="radio" name="sale_method" id="sale_methodRadio2" value="2">
                <label class="form-check-label text-white" for="sale_methodRadio2">Безналичный</label>
            </div>
        </div>
        <h1 class="w-100 fw-bold mb-0 fs-2 mb-4 text-white">Итого: <span id="totalPrice">0</span></h1>
            <input type="hidden" name="sale_products" id="productsData" value="">
        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Продать</button>
        </form>
    </div>
</div>

<script>
    function phoneFormat(input) {//returns (###) ###-####
        input = input.replace(/\D/g,'');
        let size = input.length;
        if (size>0) {input="("+input}
        if (size>3) {input=input.slice(0,4)+") "+input.slice(4,11)}
        if (size>6) {input=input.slice(0,9)+"-" +input.slice(9)}
        return input;
    }
</script>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="openReservation" aria-labelledby="reservationLabel">
    <div class="offcanvas-header bg-warning">
        <h5 class="offcanvas-title" id="reservationLabel">Создание брони</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="userInfoContainer">
        <form action="{{ route('reservations.store') }}" method="post">
            @csrf
            <div class="form-floating mb-4">
                <input type="text" id="reservation_name" name="reservation_name" class="form-control rounded-3 text-white {{ $errors->has('reservation_name') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('reservation_name') }}" required>
                <label for="reservation_name" class="text-white">Имя</label>
                @error('reservation_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" id="reservation_phone" name="reservation_phone" class="form-control rounded-3 text-white {{$errors->has('reservation_phone') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('reservation_phone') }}" onInput="this.value = phoneFormat(this.value)">
                <label for="reservation_phone" class="text-white">Телефон</label>
                @error('reservation_phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="number" id="reservation_pc" name="reservation_pc" class="form-control rounded-3 text-white {{$errors->has('reservation_pc') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('reservation_pc') }}" required min="1" max="99">
                <label for="reservation_pc" class="text-white">ПК</label>
                @error('reservation_pc')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" id="reservation_datetime" name="reservation_datetime" class="form-control flatpickr-input rounded-3 text-white {{$errors->has('reservation_datetime') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('reservation_datetime') }}" required>
                <label for="reservation_datetime" class="text-white">Дата и время</label>
                @error('reservation_datetime')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" id="reservation_details" name="reservation_details" class="form-control rounded-3 text-white {{$errors->has('reservation_details') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('reservation_details') }}">
                <label for="reservation_details" class="text-white">Детали</label>
                @error('reservation_details')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Создать</button>
        </form>
    </div>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="openRent" aria-labelledby="rentLabel">
    <div class="offcanvas-header bg-warning">
        <h5 class="offcanvas-title" id="rentLabel">Создание аренды</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="userInfoContainer">
        <form action="{{ route('rents.store') }}" method="post">
            @csrf
            <div class="form-floating mb-4">
                <input type="number" id="rent_pc" name="rent_pc" class="form-control rounded-3 text-white {{ $errors->has('rent_pc') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('rent_pc') }}" required min="1" max="99">
                <label for="rent_pc" class="text-white">ПК</label>
                @error('rent_pc')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="number" id="rent_amount" name="rent_amount" class="form-control rounded-3 text-white {{ $errors->has('rent_amount') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('rent_amount') }}" min="0" max="99999">
                <label for="rent_amount" class="text-white">Сумма</label>
                @error('rent_amount')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="number" id="rent_bonus" name="rent_bonus" class="form-control rounded-3 text-white {{ $errors->has('rent_bonus') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('rent_bonus') }}" min="0" max="9999">
                <label for="rent_bonus" class="text-white">Бонусы</label>
                @error('rent_bonus')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" id="rent_deadline" name="rent_deadline" class="form-control flatpickr-input rounded-3 text-white {{$errors->has('rent_deadline') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('rent_deadline') }}" required>
                <label for="rent_deadline" class="text-white">Дедлайн</label>
                @error('rent_deadline')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" id="rent_details" name="rent_details" class="form-control rounded-3 text-white {{$errors->has('rent_details') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('rent_details') }}">
                <label for="rent_details" class="text-white">Детали</label>
                @error('rent_details')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{$errors->has('rent_method') ? 'is-invalid' : ''}}" type="radio" name="rent_method" id="rent_methodRadio0" value="0">
                    <label class="form-check-label text-white" for="rent_methodRadio0">Нет</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{$errors->has('rent_method') ? 'is-invalid' : ''}}" type="radio" name="rent_method" id="rent_methodRadio1" value="1">
                    <label class="form-check-label text-white" for="rent_methodRadio1">Наличный</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{$errors->has('rent_method') ? 'is-invalid' : ''}}" type="radio" name="rent_method" id="rent_methodRadio2" value="2">
                    <label class="form-check-label text-white" for="rent_methodRadio2">Безналичный</label>
                </div>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Создать</button>
        </form>
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
        @elseif($errors->has('sale_method'))
        document.getElementById('openSaleOffcanvas').click();
        @elseif($errors->has('reservation_name') || $errors->has('reservation_phone') || $errors->has('reservation_pc') || $errors->has('reservation_datetime') || $errors->has('reservation_details'))
        document.getElementById('openReservationOffcanvas').click();
        @elseif($errors->has('rent_pc') || $errors->has('rent_amount') || $errors->has('rent_bonus') || $errors->has('rent_deadline') || $errors->has('rent_details') || $errors->has('rent_method'))
        document.getElementById('openRentOffcanvas').click();
        @elseif(session('status_success') || session('status_fail'))
        document.getElementById('openStatusModal').click();
        @endif
    });
</script>

</body>
</html>
