<!DOCTYPE html>
<html style="font-size: 16px;" lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/CyberLogo.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" media="screen">
    @yield('style')
    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/index.js') }}" defer=""></script>
    <meta name="generator" content="cyberadmin.ru">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Advent+Pro:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Audiowide:400">


    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "CyberAdmin",
		"logo": "{{ asset('images/CyberLogo.png') }}"
}
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
<body data-home-page="{{ route('index') }}" data-home-page-title="Home" data-path-to-root="./"
      data-include-products="false" class="u-black u-body u-xl-mode" data-lang="ru">
<header class="u-black u-clearfix u-header u-sticky u-header" id="sec-836e">
    <div class="u-clearfix u-sheet u-sheet-1">
        <a href="{{ route('index') }}" class="u-image u-logo u-image-1" data-image-width="900" data-image-height="900"
           title="Home">
            <img src="{{ asset('images/CyberLogo.png') }}" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-custom-font u-text u-text-default u-text-1">{{ env('APP_NAME') }}</p>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XS">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 500;">
                <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-border-radius u-custom-borders u-custom-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                   href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                    </svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <rect y="1" width="16" height="2"></rect>
                            <rect y="7" width="16" height="2"></rect>
                            <rect y="13" width="16" height="2"></rect>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-custom-font u-heading-font u-nav u-spacing-20 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a
                            class="u-border-2 {{ Route::is('index') ? 'u-border-active-palette-1-base' : '' }} u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-base u-text-white"
                            href="{{ route('index') }}" style="padding: 10px;">Главная</a>
                    </li>
                    <li class="u-nav-item"><a
                            class="u-border-2 {{ Route::is('users', 'products', 'booking', 'sales') ? 'u-border-active-palette-1-base' : '' }} u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-base u-text-white"
                            style="padding: 10px;">БД</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link u-white"
                                                          href="{{ route('users') }}">Пользователи</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link u-white"
                                                          href="{{ route('products') }}">Товары</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link u-white"
                                                          href="{{ route('booking') }}">Брони</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link u-white"
                                                          href="{{ route('sales') }}">Продажи</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="u-nav-item"><a
                            class="u-border-2 {{ Route::is('status') ? 'u-border-active-palette-1-base' : '' }} u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-base u-text-white"
                            href="{{ route('status') }}" style="padding: 10px;">Статус</a>
                    </li>
                    <li class="u-nav-item"><a
                            class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-button-style u-dialog-link u-nav-link u-text-active-white u-text-hover-palette-1-base u-text-white"
                            href="#sec-5f4a" style="padding: 10px;">Войти</a>
                    </li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{{ route('index') }}">Главная</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link">БД</a>
                                <div class="u-nav-popup">
                                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{ route('users') }}">Пользователи</a>
                                        </li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{ route('products') }}">Товары</a>
                                        </li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{ route('booking') }}">Брони</a>
                                        </li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{ route('sales') }}">Продажи</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{{ route('status') }}">Статус</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-dialog-link u-nav-link" href="#sec-5f4a">Войти</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <span class="u-dialog-link u-file-icon u-icon u-text-white u-icon-1" data-href="#sec-2ffe"><img
                src="{{ asset('images/7625955-b524a38d.png') }}" alt=""></span>
    </div>
</header>

@yield('main')

<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-88d0">
    <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Copyright
            &copy; {{ env('APP_NAME') . ' ' . date('Y') }}</p>
    </div>
</footer>

<section
    class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-5"
    id="sec-5f4a" data-dialog-show-on="click" data-dialog-show-on-list="603615691">
    <div class="u-align-center u-container-style u-dialog u-shape-rectangle u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
            <div class="u-form u-form-1" id="carousel-1ebc">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-email u-form-group">
                        <label for="email-2c96" class="u-label">Логин</label>
                        <input type="email" placeholder="Введите Ваш логин" id="email-2c96" name="text"
                               class="u-input u-input-rectangle" required="required" maxlength="100">
                    </div>
                    <div class="u-form-group u-form-group-2">
                        <label for="text-e465" class="u-label">Пароль</label>
                        <input type="text" placeholder="Введите Ваш пароль" id="text-e465" name="password"
                               class="u-input u-input-rectangle" required="required" maxlength="100">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-body-alt-color u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-5 .u-dialog-1 {
        width: 316px;
        height: auto;
        background-image: none;
        min-height: 260px;
        margin: 60px auto;
    }

    .u-dialog-section-5 .u-container-layout-1 {
        padding: 9px 30px 0;
    }

    .u-dialog-section-5 .u-form-1 {
        height: 251px;
        width: 256px;
        margin: 0;
    }

    .u-dialog-section-5 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-5 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-5 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 1199px) {
        .u-dialog-section-5 .u-btn-1 {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .u-dialog-section-5 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }</style>
<section
    class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-16"
    id="sec-2ffe">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div
                        class="u-form-group u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-1">
                        <label for="number-2fe4" class="u-label">Product name</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="100" step="1" type="number" placeholder="" id="number-2fe4"
                                   name="product_q" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div
                        class="u-form-group u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-2">
                        <label for="number-aac6" class="u-label">Product name</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="100" step="1" type="number" placeholder="" id="number-aac6"
                                   name="product_q" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-form-group-3">
                        <label class="u-label">Метод оплаты</label>
                        <div class="u-form-radio-button-wrapper">
                            <div class="u-input-row">
                                <input id="field-d330" type="radio" name="radiobutton" value="Наличный"
                                       class="u-field-input" data-calc="">
                                <label class="u-field-label" for="field-d330">Наличный</label>
                            </div>
                            <div class="u-input-row">
                                <input id="field-dab7" type="radio" name="radiobutton" value="Безналичный"
                                       class="u-field-input" data-calc="" checked="checked">
                                <label class="u-field-label" for="field-dab7">Безналичный</label>
                            </div>
                        </div>
                    </div>
                    <p class="u-form-group u-form-text u-text u-text-1">Итого:&nbsp;</p>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-16 .u-dialog-1 {
        width: 554px;
        min-height: 600px;
        height: auto;
        margin: 60px auto;
    }

    .u-dialog-section-16 .u-container-layout-1 {
        padding: 20px 18px 30px;
    }

    .u-dialog-section-16 .u-form-1 {
        --thumb-color: #478ac9;
        --thumb-hover-color: #77aad9;
        --track-color: #c0c0c0;
        --track-active-color: #478ac9;
        height: 267px;
        width: 494px;
        margin: 147px auto 0;
    }

    .u-dialog-section-16 .u-form-group-1 {
        --progress: 0%;
    }

    .u-dialog-section-16 .u-form-group-2 {
        --progress: 0%;
    }

    .u-dialog-section-16 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-16 .u-text-1 {
        margin-left: 0;
    }

    .u-dialog-section-16 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-16 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 1199px) {
        .u-dialog-section-16 .u-form-group-3 {
            --progress: 0%;
        }
    }

    @media (max-width: 767px) {
        .u-dialog-section-16 .u-dialog-1 {
            width: 540px;
        }

        .u-dialog-section-16 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-16 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-16 .u-form-1 {
            width: 320px;
        }
    }</style>
<section
    class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-8"
    id="sec-0432">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-group-1">
                        <label for="text-ecd3" class="u-label">Логин</label>
                        <input type="text" placeholder="Введите логин нового админа" id="text-ecd3" name="login"
                               class="u-input u-input-rectangle" required="required">
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                        <label for="select-1206" class="u-label">Точка работы</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-1206" name="address" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Пл. Максима Горького, 4" data-calc="">Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" data-calc="">Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" data-calc="">Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" data-calc="">Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" data-calc="">Пр.Молодежный, 2Б</option>
                                <option value="Пр. Октября, 25" data-calc="">Пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" data-calc="">Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" data-calc="">Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" data-calc="">Белинского, 106А</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-form-group u-form-select u-form-group-3">
                        <label for="select-7ac8" class="u-label">Уровень доступа</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-7ac8" name="select" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Обычный" data-calc="">Обычный</option>
                                <option value="Расширенный" data-calc="">Расширенный</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-8 .u-dialog-1 {
        width: 388px;
        min-height: 338px;
        height: auto;
        margin: 60px auto;
    }

    .u-dialog-section-8 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-8 .u-form-1 {
        height: 338px;
        width: 328px;
        margin: 0 auto;
    }

    .u-dialog-section-8 .u-form-group-1 {
        margin-left: 0;
    }

    .u-dialog-section-8 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-8 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-8 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-8 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-8 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-8 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-8 .u-form-1 {
            width: 320px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-9"
         id="sec-605b">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-select u-form-group-1">
                        <label for="select-1206" class="u-label">Точка работы</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-1206" name="address" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Пл. Максима Горького, 4" data-calc="">Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" data-calc="">Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" data-calc="">Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" data-calc="">Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" data-calc="">Пр.Молодежный, 2Б</option>
                                <option value="Пр. Октября, 25" data-calc="">Пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" data-calc="">Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" data-calc="">Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" data-calc="">Белинского, 106А</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                        <label for="select-7ac8" class="u-label">Уровень доступа</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-7ac8" name="select" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Обычный" data-calc="">Обычный</option>
                                <option value="Расширенный" data-calc="">Расширенный</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-9 .u-dialog-1 {
        width: 388px;
        min-height: 251px;
        height: auto;
        margin: 264px auto 60px;
    }

    .u-dialog-section-9 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-9 .u-form-1 {
        height: 338px;
        width: 328px;
        margin: 0 auto;
    }

    .u-dialog-section-9 .u-form-group-1 {
        margin-left: 0;
    }

    .u-dialog-section-9 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-9 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-9 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-9 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-9 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-9 .u-form-1 {
            width: 320px;
        }
    }</style>
<section
    class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-10"
    id="sec-9330">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-group-1">
                        <label for="text-ecd3" class="u-label">Товар</label>
                        <input type="text" placeholder="Введите название нового товара" id="text-ecd3" name="name"
                               class="u-input u-input-rectangle" required="required">
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                        <label for="select-1206" class="u-label">Адрес</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-1206" name="address" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Пл. Максима Горького, 4" data-calc="">Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" data-calc="">Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" data-calc="">Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" data-calc="">Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" data-calc="">Пр.Молодежный, 2Б</option>
                                <option value="Пр. Октября, 25" data-calc="">Пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" data-calc="">Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" data-calc="">Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" data-calc="">Белинского, 106А</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-form-group u-form-number u-form-number-layout-number u-form-group-3">
                        <label for="number-7f74" class="u-label">Цена</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="999" step="1" type="number" placeholder="" id="number-7f74"
                                   name="price" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-10 .u-dialog-1 {
        width: 388px;
        min-height: 338px;
        height: auto;
        margin: 60px auto;
    }

    .u-dialog-section-10 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-10 .u-form-1 {
        height: 338px;
        width: 328px;
        margin: 0 auto;
    }

    .u-dialog-section-10 .u-form-group-1 {
        margin-left: 0;
    }

    .u-dialog-section-10 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-10 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-10 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-10 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-10 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-10 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-10 .u-form-1 {
            width: 320px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-11"
         id="sec-e12c">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-group-1">
                        <label for="text-6f6d" class="u-label">Товар</label>
                        <input type="text" placeholder="Введите новое название товара" id="text-6f6d" name="name"
                               class="u-input u-input-rectangle" required="required">
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                        <label for="select-1206" class="u-label">Адрес</label>
                        <div class="u-form-select-wrapper">
                            <select id="select-1206" name="address" class="u-input u-input-rectangle"
                                    required="required">
                                <option value="Пл. Максима Горького, 4" data-calc="">Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" data-calc="">Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" data-calc="">Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" data-calc="">Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" data-calc="">Пр.Молодежный, 2Б</option>
                                <option value="Пр. Октября, 25" data-calc="">Пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" data-calc="">Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" data-calc="">Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" data-calc="">Белинского, 106А</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                 y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;"
                                 xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-form-group u-form-number u-form-number-layout-number u-form-group-3">
                        <label for="number-e2c4" class="u-label">Цена</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="999" step="1" type="number" placeholder="" id="number-e2c4"
                                   name="price" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-11 .u-dialog-1 {
        width: 388px;
        height: auto;
        margin: 264px auto 60px;
    }

    .u-dialog-section-11 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-11 .u-form-1 {
        height: 338px;
        width: 328px;
        margin: 0 auto;
    }

    .u-dialog-section-11 .u-form-group-1 {
        margin-left: 0;
    }

    .u-dialog-section-11 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-11 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-11 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-11 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 1199px) {
        .u-dialog-section-11 .u-dialog-1 {
            min-height: 251px;
        }
    }

    @media (max-width: 767px) {
        .u-dialog-section-11 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-11 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-11 .u-form-1 {
            width: 320px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-14"
         id="sec-daa5">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-name">
                        <label for="name-a5b4" class="u-label">Имя</label>
                        <input type="text" placeholder="Введите имя клиента" id="name-a5b4" name="name"
                               class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-phone u-form-group-2">
                        <label for="phone-9253" class="u-label">Телефон</label>
                        <input type="tel"
                               pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                               placeholder="Телефон в формате +7(917)0500070" id="phone-9253" name="phone"
                               class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-time u-form-group-3">
                        <label for="time-e907" class="u-label">Время</label>
                        <input type="time" id="time-e907" name="time" class="u-input u-input-rectangle">
                    </div>
                    <div class="u-form-date u-form-group u-form-input-layout-horizontal u-form-group-4">
                        <label for="date-feba" class="u-label">Дата</label>
                        <input type="text" readonly="readonly" placeholder="DD/MM/YYYY" id="date-feba" name="date"
                               class="u-input u-input-rectangle" data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="u-form-group u-form-number u-form-number-layout-number u-form-group-5">
                        <label for="number-bdc6" class="u-label">ПК</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="1" max="100" step="1" type="number" placeholder="" id="number-bdc6"
                                   name="pc" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-group-6">
                        <label for="text-0698" class="u-label">Комментарий</label>
                        <input type="text" placeholder="" id="text-0698" name="details"
                               class="u-input u-input-rectangle">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-14 .u-dialog-1 {
        width: 400px;
        min-height: 515px;
        height: auto;
        margin: 140px auto 60px;
    }

    .u-dialog-section-14 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-14 .u-form-1 {
        --thumb-color: #478ac9;
        --thumb-hover-color: #77aad9;
        --track-color: #c0c0c0;
        --track-active-color: #478ac9;
        height: 614px;
        width: 314px;
        margin: 0 auto;
    }

    .u-dialog-section-14 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-14 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-14 .u-form-group-4 {
        margin-left: 0;
    }

    .u-dialog-section-14 .u-form-group-5 {
        --progress: 0%;
    }

    .u-dialog-section-14 .u-form-group-6 {
        margin-left: 0;
    }

    .u-dialog-section-14 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-14 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-14 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-14 .u-dialog-1 {
            width: 340px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-15"
         id="sec-e009">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-name">
                        <label for="name-a5b4" class="u-label">Имя</label>
                        <input type="text" placeholder="Введите имя клиента" id="name-a5b4" name="name"
                               class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-number u-form-number-layout-number u-form-group-2">
                        <label for="number-6bba" class="u-label">ПК</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="1" max="100" step="1" type="number" placeholder="" id="number-6bba"
                                   name="pc" class="u-input u-input-rectangle u-text-black">
                        </div>
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-form-group-3">
                        <label class="u-label">Метод оплаты</label>
                        <div class="u-form-radio-button-wrapper">
                            <div class="u-input-row">
                                <input id="field-473e" type="radio" name="method" value="Наличный" class="u-field-input"
                                       checked="checked" data-calc="">
                                <label class="u-field-label" for="field-473e">Наличный</label>
                            </div>
                            <div class="u-input-row">
                                <input id="field-9610" type="radio" name="method" value="Безналичный"
                                       class="u-field-input" data-calc="">
                                <label class="u-field-label" for="field-9610">Безналичный</label>
                            </div>
                        </div>
                    </div>
                    <div
                        class="u-form-group u-form-input-layout-horizontal u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-4">
                        <label for="number-ca80" class="u-label">Сумма</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="9999" step="1" type="number" placeholder="" id="number-ca80"
                                   name="amount" class="u-input u-number">
                        </div>
                    </div>
                    <div
                        class="u-form-group u-form-input-layout-horizontal u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-5">
                        <label for="number-20fb" class="u-label">Бонусы</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="9999" step="1" type="number" placeholder="" id="number-20fb"
                                   name="bonus" class="u-input u-number">
                        </div>
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-group-6">
                        <label for="text-0698" class="u-label">Комментарий</label>
                        <input type="text" placeholder="" id="text-0698" name="details"
                               class="u-input u-input-rectangle">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-15 .u-dialog-1 {
        width: 400px;
        min-height: 404px;
        height: auto;
        margin: 140px auto 60px;
    }

    .u-dialog-section-15 .u-container-layout-1 {
        padding: 1px 30px;
    }

    .u-dialog-section-15 .u-form-1 {
        --thumb-color: #478ac9;
        --thumb-hover-color: #77aad9;
        --track-color: #c0c0c0;
        --track-active-color: #478ac9;
        height: 614px;
        width: 314px;
        margin: 0 auto;
    }

    .u-dialog-section-15 .u-form-group-2 {
        --progress: 0%;
    }

    .u-dialog-section-15 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-15 .u-form-group-4 {
        --progress: 0%;
        margin-left: 0;
    }

    .u-dialog-section-15 .u-form-group-5 {
        --progress: 0%;
        margin-left: 0;
    }

    .u-dialog-section-15 .u-form-group-6 {
        margin-left: 0;
    }

    .u-dialog-section-15 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-15 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-15 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-15 .u-dialog-1 {
            width: 340px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-7"
         id="sec-01c2">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
            <p class="u-text u-text-default u-text-1">Информация - Компьютер 19</p>
            <p class="u-text u-text-default u-text-2">Брони:</p>
            <div class="u-table u-table-responsive u-table-1">
                <table class="u-table-entity">
                    <colgroup>
                        <col width="16.6%">
                        <col width="18.2%">
                        <col width="10.7%">
                        <col width="10.6%">
                        <col width="26.9%">
                        <col width="17.000000000000004%">
                    </colgroup>
                    <thead class="u-palette-1-light-2 u-table-header u-table-header-1">
                    <tr style="height: 46px;">
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Имя клиента</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Телефон клиента</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Время</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Дата</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Детали</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Дейсвтие</th>
                    </tr>
                    </thead>
                    <tbody class="u-table-body u-table-body-1">
                    <tr style="height: 46px;">
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Генадий</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">+7(995)013-26-91</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">16:05</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">19.10.2023</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Просит поставить на скачку гта 5</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                    </tr>
                    <tr style="height: 46px;">
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <span class="u-file-icon u-icon u-icon-1"><img src="images/6932392.png" alt=""></span><span
                class="u-dialog-link u-file-icon u-icon u-icon-2" data-href="#sec-daa5"><img src="images/9443579.png"
                                                                                             alt=""></span>
            <p class="u-text u-text-default u-text-3">Покупки (только текущего клиента на этом ПК!):</p>
            <div class="u-table u-table-responsive u-table-2">
                <table class="u-table-entity">
                    <colgroup>
                        <col width="15.7%">
                        <col width="17%">
                        <col width="50.3%">
                        <col width="17%">
                    </colgroup>
                    <thead class="u-palette-1-light-2 u-table-header u-table-header-2">
                    <tr style="height: 46px;">
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Имя клиента</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Время покупки</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Детали</th>
                        <th class="u-border-1 u-border-grey-dark-1 u-table-cell">Дейсвтие</th>
                    </tr>
                    </thead>
                    <tbody class="u-table-body u-table-body-2">
                    <tr style="height: 46px;">
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Генадий</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">16:05</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Громко кричит!</td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                    </tr>
                    <tr style="height: 46px;">
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <span class="u-dialog-link u-file-icon u-icon u-icon-3" data-href="#sec-e009"><img src="images/9443579.png"
                                                                                               alt=""></span><span
                class="u-file-icon u-icon u-icon-4"><img src="images/6932392.png" alt=""></span>
            <a href="#sec-ba72"
               class="u-border-none u-btn u-btn-round u-button-style u-dialog-link u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Допродажа</a>
            <a href="#sec-a810"
               class="u-border-none u-btn u-btn-round u-button-style u-dialog-link u-palette-1-base u-radius-9 u-text-hover-black u-btn-2">Продажа</a>
            <a href="#sec-c591"
               class="u-border-none u-btn u-btn-round u-button-style u-dialog-link u-palette-1-base u-radius-9 u-text-hover-black u-btn-3">Бронь</a>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-5">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-7 .u-dialog-1 {
        width: 887px;
        min-height: 700px;
        height: auto;
        margin: 107px auto 35px;
    }

    .u-dialog-section-7 .u-container-layout-1 {
        padding: 0;
    }

    .u-dialog-section-7 .u-text-1 {
        font-size: 1.25rem;
        margin: 0 auto;
    }

    .u-dialog-section-7 .u-text-2 {
        margin: 0 auto 0 30px;
    }

    .u-dialog-section-7 .u-table-1 {
        width: 827px;
        margin: 4px auto 0;
    }

    .u-dialog-section-7 .u-table-header-1 {
        background-image: none;
    }

    .u-dialog-section-7 .u-table-body-1 {
        font-size: 0.875rem;
    }

    .u-block-9bde-33 {
        height: 46px;
    }

    .u-dialog-section-7 .u-icon-1 {
        width: 37px;
        height: 37px;
        margin: -97px 51px 0 auto;
        padding: 0;
    }

    .u-dialog-section-7 .u-icon-2 {
        width: 37px;
        height: 37px;
        margin: -37px 118px 0 auto;
        padding: 0;
    }

    .u-dialog-section-7 .u-text-3 {
        margin: 64px auto 0 30px;
    }

    .u-dialog-section-7 .u-table-2 {
        width: 827px;
        margin: 4px auto 0;
    }

    .u-dialog-section-7 .u-table-header-2 {
        background-image: none;
    }

    .u-dialog-section-7 .u-table-body-2 {
        font-size: 0.875rem;
    }

    .u-block-9bde-124 {
        height: 46px;
    }

    .u-dialog-section-7 .u-icon-3 {
        width: 37px;
        height: 37px;
        margin: -88px 118px 0 auto;
        padding: 0;
    }

    .u-dialog-section-7 .u-icon-4 {
        width: 37px;
        height: 37px;
        margin: -37px 51px 0 auto;
        padding: 0;
    }

    .u-dialog-section-7 .u-btn-1 {
        background-image: none;
        margin: 274px 30px 0 auto;
        padding: 10px 81px 10px 80px;
    }

    .u-dialog-section-7 .u-btn-2 {
        background-image: none;
        margin: -45px auto 0;
        padding: 10px 90px;
    }

    .u-dialog-section-7 .u-btn-3 {
        background-image: none;
        margin: -45px auto 0 30px;
        padding: 10px 101px 10px 100px;
    }

    .u-dialog-section-7 .u-icon-5 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 991px) {
        .u-dialog-section-7 .u-dialog-1 {
            width: 720px;
        }

        .u-dialog-section-7 .u-table-1 {
            width: 720px;
        }

        .u-dialog-section-7 .u-text-3 {
            margin-left: 0;
        }

        .u-dialog-section-7 .u-table-2 {
            width: 720px;
        }

        .u-dialog-section-7 .u-icon-3 {
            margin-top: -244px;
        }

        .u-dialog-section-7 .u-btn-1 {
            margin-top: -173px;
            margin-right: 0;
        }

        .u-dialog-section-7 .u-btn-3 {
            margin-left: 0;
        }
    }

    @media (max-width: 767px) {
        .u-dialog-section-7 .u-dialog-1 {
            width: 540px;
        }

        .u-dialog-section-7 .u-text-1 {
            font-size: 1rem;
        }

        .u-dialog-section-7 .u-table-1 {
            width: 540px;
        }

        .u-dialog-section-7 .u-table-2 {
            width: 540px;
            margin-top: -109px;
        }

        .u-dialog-section-7 .u-icon-3 {
            margin-top: -88px;
        }

        .u-dialog-section-7 .u-btn-1 {
            margin-top: -267px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-7 .u-dialog-1 {
            width: 340px;
        }

        .u-dialog-section-7 .u-table-1 {
            width: 340px;
        }

        .u-dialog-section-7 .u-icon-2 {
            margin-right: 74px;
        }

        .u-dialog-section-7 .u-table-2 {
            width: 340px;
            margin-top: -100px;
        }

        .u-dialog-section-7 .u-icon-3 {
            margin-top: -247px;
            margin-right: 74px;
        }

        .u-dialog-section-7 .u-btn-1 {
            margin-top: -239px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-12"
         id="sec-ba72">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-form-group-1">
                        <label class="u-label">Метод оплаты</label>
                        <div class="u-form-radio-button-wrapper">
                            <div class="u-input-row">
                                <input id="field-473e" type="radio" name="method" value="Наличный" class="u-field-input"
                                       checked="checked" data-calc="">
                                <label class="u-field-label" for="field-473e">Наличный</label>
                            </div>
                            <div class="u-input-row">
                                <input id="field-9610" type="radio" name="method" value="Безналичный"
                                       class="u-field-input" data-calc="">
                                <label class="u-field-label" for="field-9610">Безналичный</label>
                            </div>
                        </div>
                    </div>
                    <div
                        class="u-form-group u-form-input-layout-horizontal u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-2">
                        <label for="number-ca80" class="u-label">Сумма</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="9999" step="1" type="number" placeholder="" id="number-ca80"
                                   name="amount" class="u-input u-number">
                        </div>
                    </div>
                    <div
                        class="u-form-group u-form-input-layout-horizontal u-form-number u-form-number-layout-number u-form-partition-factor-2 u-form-group-3">
                        <label for="number-20fb" class="u-label">Бонусы</label>
                        <div class="u-input-row" data-value="0">
                            <input value="0" min="0" max="9999" step="1" type="number" placeholder="" id="number-20fb"
                                   name="bonus" class="u-input u-number">
                        </div>
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-group-4">
                        <label for="text-0698" class="u-label">Комментарий</label>
                        <input type="text" placeholder="" id="text-0698" name="details"
                               class="u-input u-input-rectangle">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-12 .u-dialog-1 {
        width: 400px;
        min-height: 317px;
        height: auto;
        margin: 140px auto 60px;
    }

    .u-dialog-section-12 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-12 .u-form-1 {
        --thumb-color: #478ac9;
        --thumb-hover-color: #77aad9;
        --track-color: #c0c0c0;
        --track-active-color: #478ac9;
        height: 614px;
        width: 314px;
        margin: 0 auto;
    }

    .u-dialog-section-12 .u-form-group-1 {
        margin-left: 0;
    }

    .u-dialog-section-12 .u-form-group-2 {
        --progress: 0%;
        margin-left: 0;
    }

    .u-dialog-section-12 .u-form-group-3 {
        --progress: 0%;
        margin-left: 0;
    }

    .u-dialog-section-12 .u-form-group-4 {
        margin-left: 0;
    }

    .u-dialog-section-12 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-12 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-12 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-12 .u-dialog-1 {
            width: 340px;
        }
    }</style>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-13"
         id="sec-c591">
    <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="https://forms.nicepagesrv.com/v2/form/process"
                      class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form"
                      style="padding: 10px;">
                    <div class="u-form-group u-form-name">
                        <label for="name-a5b4" class="u-label">Имя</label>
                        <input type="text" placeholder="Введите имя клиента" id="name-a5b4" name="name"
                               class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-phone u-form-group-2">
                        <label for="phone-9253" class="u-label">Телефон</label>
                        <input type="tel"
                               pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                               placeholder="Телефон в формате +7(917)0500070" id="phone-9253" name="phone"
                               class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-time u-form-group-3">
                        <label for="time-e907" class="u-label">Время</label>
                        <input type="time" id="time-e907" name="time" class="u-input u-input-rectangle">
                    </div>
                    <div class="u-form-date u-form-group u-form-input-layout-horizontal u-form-group-4">
                        <label for="date-feba" class="u-label">Дата</label>
                        <input type="text" readonly="readonly" placeholder="DD/MM/YYYY" id="date-feba" name="date"
                               class="u-input u-input-rectangle" data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="u-form-group u-form-input-layout-horizontal u-form-group-5">
                        <label for="text-0698" class="u-label">Комментарий</label>
                        <input type="text" placeholder="" id="text-0698" name="details"
                               class="u-input u-input-rectangle">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#"
                           class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-1-base u-radius-9 u-text-hover-black u-btn-1">Отправить</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Спасибо! Ваше сообщение отправлено.</div>
                    <div class="u-form-send-error u-form-send-message"> Отправка не удалась. Пожалуйста, исправьте
                        ошибки и попробуйте еще раз.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="80e2dafd-9b41-002d-667e-0aa23394451d">
                </form>
            </div>
        </div>
        <button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect
                    x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2"
                    height="16"></rect>
                <rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16"
                      height="2"></rect></svg>
        </button>
    </div>
</section>
<style>.u-dialog-section-13 .u-dialog-1 {
        width: 400px;
        min-height: 515px;
        height: auto;
        margin: 140px auto 60px;
    }

    .u-dialog-section-13 .u-container-layout-1 {
        padding: 0 30px;
    }

    .u-dialog-section-13 .u-form-1 {
        --thumb-color: #478ac9;
        --thumb-hover-color: #77aad9;
        --track-color: #c0c0c0;
        --track-active-color: #478ac9;
        height: 614px;
        width: 314px;
        margin: 0 auto;
    }

    .u-dialog-section-13 .u-form-group-2 {
        margin-left: 0;
    }

    .u-dialog-section-13 .u-form-group-3 {
        margin-left: 0;
    }

    .u-dialog-section-13 .u-form-group-4 {
        margin-left: 0;
    }

    .u-dialog-section-13 .u-form-group-5 {
        margin-left: 0;
    }

    .u-dialog-section-13 .u-btn-1 {
        background-image: none;
    }

    .u-dialog-section-13 .u-icon-1 {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 767px) {
        .u-dialog-section-13 .u-container-layout-1 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-13 .u-dialog-1 {
            width: 340px;
        }
    }</style>
</body>
</html>
