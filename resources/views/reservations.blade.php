@extends('layout')

@section('content')

    <div class="vh-100" style = "margin-top: 15vh">
        <div class="row justify-content-center" style="margin-right: 0">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-white">Брони</h2>
            </div>
        </div>
        <table class="table table-dark table-hover text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>ПК</th>
                <th>Дата и время</th>
                <th>Детали</th>
                <th>Создана</th>
                <th>Изменена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($reservations as $reservation)
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ $reservation->pc }}</td>
                    <td>{{ $reservation->formattedDate }}</td>
                    <td>{{ $reservation->details }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>{{ $reservation->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-icon open-update-modal" data-bs-toggle="modal" data-bs-target="#modalUpdateReservationForm" data-reservation-id="{{ $reservation->id }}" id="openUpdateReservationForm"><i class="bi bi-list"></i></button>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="display: inline;">
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
                <h2 class="text-white">Всего {{ count($reservations) }}</h2>
        </div>
    </div>

    @if(isset($reservation))
    <div class="modal fade" id="modalUpdateReservationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Изменение брони</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('reservations.update', $reservation) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-4">
                            <input type="text" id="update_reservation_name" name="update_reservation_name" class="form-control rounded-3 text-white {{ $errors->has('update_reservation_name') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_reservation_name') }}" required>
                            <label for="update_reservation_name" class="text-white">Имя</label>
                            @error('update_reservation_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" id="update_reservation_phone" name="update_reservation_phone" class="form-control rounded-3 text-white {{$errors->has('update_reservation_phone') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_reservation_phone') }}" onInput="this.value = phoneFormat(this.value)">
                            <label for="update_reservation_phone" class="text-white">Телефон</label>
                            @error('update_reservation_phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" id="update_reservation_pc" name="update_reservation_pc" class="form-control rounded-3 text-white {{$errors->has('update_reservation_pc') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_reservation_pc') }}" required min="1" max="99">
                            <label for="update_reservation_pc" class="text-white">ПК</label>
                            @error('update_reservation_pc')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" id="update_reservation_datetime" name="update_reservation_datetime" class="form-control flatpickr-input rounded-3 text-white {{$errors->has('update_reservation_datetime') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_reservation_datetime') }}" required>
                            <label for="update_reservation_datetime" class="text-white">Дата и время</label>
                            @error('update_reservation_datetime')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" id="update_reservation_details" name="update_reservation_details" class="form-control rounded-3 text-white {{$errors->has('update_reservation_details') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_reservation_details') }}">
                            <label for="update_reservation_details" class="text-white">Детали</label>
                            @error('update_reservation_details')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
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
            @if($errors->has('update_reservation_name') || $errors->has('update_reservation_phone') || $errors->has('update_reservation_pc') || $errors->has('update_reservation_datetime') || $errors->has('update_reservation_details'))
            document.getElementById('openUpdateReservationForm').click();
            @endif

            document.querySelectorAll('.open-update-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const reservationId = button.getAttribute('data-reservation-id');

                    // Загрузка данных пользователя по userId с использованием AJAX
                    fetch(`/get-reservation-data/${reservationId}`)
                        .then(response => response.json())
                        .then(({ update_reservation_name, update_reservation_phone, update_reservation_pc, update_reservation_datetime, update_reservation_details }) => {
                            document.querySelector('#modalUpdateReservationForm form').action = `/reservations/${reservationId}`;
                            document.querySelector('#update_reservation_name').value = update_reservation_name;
                            document.querySelector('#update_reservation_phone').value = update_reservation_phone;
                            document.querySelector('#update_reservation_pc').value = update_reservation_pc;
                            document.querySelector('#update_reservation_datetime').value = update_reservation_datetime;
                            document.querySelector('#update_reservation_details').value = update_reservation_details;
                        });
                });
            });
        });
    </script>

@endsection
