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

    <button data-bs-target="#modalResetForm" data-bs-toggle="modal" id="openResetForm" style="display: none"></button>

    <div class="modal fade" id="modalResetForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Восстановление пароля</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf

                        <input type="hidden" name="password_reset_token" value="{{ $request->token }}">
                        <input type="hidden" name="reset_email" value="{{ $request->email }}">

                        <div class="form-floating mb-4">
                            <input type="password" id="reset_password" name="reset_password" class="form-control rounded-3 text-white {{$errors->has('reset_password') ? 'is-invalid' : ''}}" placeholder="" required>
                            <label for="reset_password" class="text-white">Придумайте новый пароль</label>
                            @error('reset_password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" id="reset_password_confirmation" name="reset_password_confirmation" class="form-control rounded-3 text-white {{$errors->has('reset_password_confirmation') ? 'is-invalid' : ''}}"  placeholder="" required>
                            <label for="reset_password_confirmation" class="text-white">Повторите пароль</label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Восстановить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(isset($passwordResetInProgress) && $passwordResetInProgress)
            document.getElementById('openResetForm').click();
            @endif
        });
    </script>

@endsection
