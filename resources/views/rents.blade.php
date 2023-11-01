@extends('layout')

@section('content')

    <div class="vh-100" style = "margin-top: 15vh">
        <div class="row justify-content-center" style="margin-right: 0">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-white">Аренды</h2>
            </div>
        </div>
        <table class="table table-dark table-hover text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>ПК</th>
                <th>Сумма</th>
                <th>Метод оплаты</th>
                <th>Бонусы</th>
                <th>Дедлайн</th>
                <th>Детали</th>
                <th>Создана</th>
                <th>Изменена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($rents as $rent)
                    <td>{{ $rent->id }}</td>
                    <td>{{ $rent->pc }}</td>
                    <td>{{ $rent->amount }}</td>
                    <td>
                        @if ($rent->method == 1)
                            Наличный
                        @elseif ($rent->method == 2)
                            Безналичный
                        @endif
                    </td>
                    <td>{{ $rent->bonus }}</td>
                    <td>{{ $rent->formattedDate }}</td>
                    <td>{{ $rent->details }}</td>
                    <td>{{ $rent->created_at }}</td>
                    <td>{{ $rent->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-icon open-update-modal" data-bs-toggle="modal" data-bs-target="#modalUpdateRentForm" data-rent-id="{{ $rent->id }}" id="openUpdateRentForm"><i class="bi bi-list"></i></button>
                        <form action="{{ route('rents.destroy', $rent) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-warning btn-icon"><i class="bi bi-x"></i></button>
                        </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row text-center" style="margin-right: 0">
            <h2 class="text-white">Всего {{ count($rents) }}</h2>
        </div>
    </div>

    @if(isset($rent))
        <div class="modal fade" id="modalUpdateRentForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow text-white">
                    <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                        <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Изменение аренды</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form action="{{ route('rents.update', $rent) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-4">
                                <input type="number" id="update_rent_pc" name="update_rent_pc" class="form-control rounded-3 text-white {{ $errors->has('update_rent_pc') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_rent_pc') }}" required min="1" max="99">
                                <label for="update_rent_pc" class="text-white">ПК</label>
                                @error('update_rent_pc')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" id="update_rent_amount" name="update_rent_amount" class="form-control rounded-3 text-white {{ $errors->has('update_rent_amount') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_rent_amount') }}" min="0" max="99999">
                                <label for="update_rent_amount" class="text-white">Сумма</label>
                                @error('update_rent_amount')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" id="update_rent_bonus" name="update_rent_bonus" class="form-control rounded-3 text-white {{ $errors->has('update_rent_bonus') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_rent_bonus') }}" min="0" max="9999">
                                <label for="update_rent_bonus" class="text-white">Бонусы</label>
                                @error('update_rent_bonus')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" id="update_rent_deadline" name="update_rent_deadline" class="form-control flatpickr-input rounded-3 text-white {{$errors->has('update_rent_deadline') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_rent_deadline') }}" required>
                                <label for="update_rent_deadline" class="text-white">Дедлайн</label>
                                @error('update_rent_deadline')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" id="update_rent_details" name="update_rent_details" class="form-control rounded-3 text-white {{$errors->has('update_rent_details') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_rent_details') }}">
                                <label for="update_rent_details" class="text-white">Детали</label>
                                @error('update_rent_details')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input {{$errors->has('update_rent_method') ? 'is-invalid' : ''}}" type="radio" name="update_rent_method" id="update_rent_methodRadio0" value="0">
                                    <label class="form-check-label text-white" for="update_rent_methodRadio0">Нет</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input {{$errors->has('update_rent_method') ? 'is-invalid' : ''}}" type="radio" name="update_rent_method" id="update_rent_methodRadio1" value="1">
                                    <label class="form-check-label text-white" for="update_rent_methodRadio1">Наличный</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input {{$errors->has('update_rent_method') ? 'is-invalid' : ''}}" type="radio" name="update_rent_method" id="update_rent_methodRadio2" value="2">
                                    <label class="form-check-label text-white" for="update_rent_methodRadio2">Безналичный</label>
                                </div>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            @if($errors->has('update_rent_pc') || $errors->has('update_rent_amount') || $errors->has('update_rent_bonus') || $errors->has('update_rent_deadline') || $errors->has('update_rent_details') || $errors->has('update_rent_method'))
            document.getElementById('openUpdateRentForm').click();
            @endif

            document.querySelectorAll('.open-update-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const rentId = button.getAttribute('data-rent-id');

                    // Загрузка данных пользователя по userId с использованием AJAX
                    fetch(`/get-rent-data/${rentId}`)
                        .then(response => response.json())
                        .then(({ update_rent_pc, update_rent_amount, update_rent_bonus, update_rent_deadline, update_rent_details }) => {
                            document.querySelector('#modalUpdateRentForm form').action = `/rents/${rentId}`;
                            document.querySelector('#update_rent_pc').value = update_rent_pc;
                            document.querySelector('#update_rent_amount').value = update_rent_amount;
                            document.querySelector('#update_rent_bonus').value = update_rent_bonus;
                            document.querySelector('#update_rent_deadline').value = update_rent_deadline;
                            document.querySelector('#update_rent_details').value = update_rent_details;
                        });
                });
            });
        });
    </script>

@endsection
