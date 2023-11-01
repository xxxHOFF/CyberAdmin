@extends('layout')

@section('content')


    <div class="vh-100" style = "margin-top: 15vh">
        <div class="row justify-content-center" style="margin-right: 0">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-white">Пользователи <button class="btn btn-outline-warning btn-icon" data-bs-toggle="modal" data-bs-target="#modalCreateUserForm" id="openCreateUserForm"><i class="bi bi-plus"></i></button></h2>
            </div>
        </div>
        <table class="table table-dark table-hover text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Адрес</th>
                <th>Уровень доступа</th>
                <th>Создан</th>
                <th>Изменен</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($users as $user)
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-icon open-update-modal" data-bs-toggle="modal" data-bs-target="#modalUpdateUserForm" data-user-id="{{ $user->id }}" id="openUpdateUserForm"><i class="bi bi-list"></i></button>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
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
            <h2 class="text-white">Всего {{ count($users) }}</h2>
        </div>
    </div>

    <div class="modal fade" id="modalCreateUserForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Создание пользователя</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" id="forced_name" name="forced_name" class="form-control rounded-3 text-white {{$errors->has('forced_name') ? 'is-invalid' : ''}}" placeholder="" value="{{old('forced_name')}}" required>
                            <label for="forced_name" class="text-white">Имя</label>
                            @error('forced_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="email" id="forced_email" name="forced_email" class="form-control rounded-3 text-white {{$errors->has('forced_email') ? 'is-invalid' : ''}}" placeholder="" value="{{old('forced_email')}}" required>
                            <label for="forced_email" class="text-white">E-mail</label>
                            @error('forced_email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="forced_address" name="forced_address" class="form-control text-white {{$errors->has('forced_address') ? 'is-invalid' : ''}}" aria-label="Точка работы" required>
                                <option value="" selected disabled>Выберите адрес</option>
                                <option value="Пл. Максима Горького, 4" {{ old('forced_address') == 'Пл. Максима Горького, 4' ? 'selected' : '' }}>Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" {{ old('forced_address') == 'Коминтерна, 123' ? 'selected' : '' }}>Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" {{ old('forced_address') == 'Мещерский бульвар, 7' ? 'selected' : '' }}>Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" {{ old('forced_address') == 'Пр. Ленина, 28' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" {{ old('forced_address') == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр.Молодежный, 2Б</option>
                                <option value="пр. Октября, 25" {{ old('forced_address') == 'пр. Октября, 25' ? 'selected' : '' }}>пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" {{ old('forced_address') == 'Казанское шоссе, 5' ? 'selected' : '' }}>Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" {{ old('forced_address') == 'Пр. Гагарина, 212А' ? 'selected' : '' }}>Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" {{ old('forced_address') == 'Белинского, 106А' ? 'selected' : '' }}>Белинского, 106А</option>
                            </select>
                            @error('forced_address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="forced_level" name="forced_level" class="form-control text-white {{$errors->has('forced_level') ? 'is-invalid' : ''}}" aria-label="Роль" required>
                                <option value="" selected disabled>Выберите роль</option>
                                <option value="0" {{ old('forced_level') == 0 ? 'selected' : '' }}>Пользователь</option>
                                <option value="1" {{ old('forced_level') == 1 ? 'selected' : '' }}>Администратор</option>
                                <option value="2" {{ old('forced_level') == 2 ? 'selected' : '' }}>Старший администратор</option>
                                <option value="3" {{ old('forced_level') == 3 ? 'selected' : '' }}>Руководитель</option>
                            </select>
                            @error('forced_level')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($user))
    <div class="modal fade" id="modalUpdateUserForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Изменение пользователя</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-4">
                            <input type="text" id="update_user_name" name="update_user_name" class="form-control rounded-3 text-white {{$errors->has('update_user_name') ? 'is-invalid' : ''}}" placeholder="" value="{{old('update_user_name')}}" required>
                            <label for="update_user_name" class="text-white">Имя</label>
                            @error('update_user_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="email" id="update_user_email" name="update_user_email" class="form-control rounded-3 text-white {{$errors->has('update_user_email') ? 'is-invalid' : ''}}" placeholder="" value="{{old('update_user_email')}}" required>
                            <label for="update_user_email" class="text-white">E-mail</label>
                            @error('update_user_email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="update_user_address" name="update_user_address" class="form-control text-white {{$errors->has('update_user_address') ? 'is-invalid' : ''}}" aria-label="Точка работы" required>
                                <option value="" selected disabled>Выберите адрес</option>
                                <option value="Пл. Максима Горького, 4" {{ old('update_user_address', $user->address) == 'Пл. Максима Горького, 4' ? 'selected' : '' }}>Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" {{ old('update_user_address', $user->address) == 'Коминтерна, 123' ? 'selected' : '' }}>Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" {{ old('update_user_address', $user->address) == 'Мещерский бульвар, 7' ? 'selected' : '' }}>Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" {{ old('update_user_address', $user->address) == 'Пр. Ленина, 28' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" {{ old('update_user_address', $user->address) == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр.Молодежный, 2Б</option>
                                <option value="пр. Октября, 25" {{ old('update_user_address', $user->address) == 'пр. Октября, 25' ? 'selected' : '' }}>пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" {{ old('update_user_address', $user->address) == 'Казанское шоссе, 5' ? 'selected' : '' }}>Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" {{ old('update_user_address', $user->address) == 'Пр. Гагарина, 212А' ? 'selected' : '' }}>Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" {{ old('update_user_address', $user->address) == 'Белинского, 106А' ? 'selected' : '' }}>Белинского, 106А</option>
                            </select>
                            @error('update_user_address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="update_user_level" name="update_user_level" class="form-control text-white {{$errors->has('update_user_level') ? 'is-invalid' : ''}}" aria-label="Роль" required>
                                <option value="" selected disabled>Выберите роль</option>
                                <option value="0" {{ old('update_user_level', $user->level) == 0 ? 'selected' : '' }}>Пользователь</option>
                                <option value="1" {{ old('update_user_level', $user->level) == 1 ? 'selected' : '' }}>Администратор</option>
                                <option value="2" {{ old('update_user_level', $user->level) == 2 ? 'selected' : '' }}>Старший администратор</option>
                                <option value="3" {{ old('update_user_level', $user->level) == 3 ? 'selected' : '' }}>Руководитель</option>
                            </select>
                            @error('update_user_level')
                            <small class="text-danger">{{$message}}</small>
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

            @if($errors->has('forced_name') || $errors->has('forced_email') || $errors->has('forced_address') || $errors->has('forced_level'))
            document.getElementById('openCreateUserForm').click();
            @elseif($errors->has('update_user_name') || $errors->has('update_user_email') || $errors->has('update_user_address') || $errors->has('update_user_level'))
            document.getElementById('openUpdateUserForm').click();
            @endif

            document.querySelectorAll('.open-update-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const userId = button.getAttribute('data-user-id');

                    // Загрузка данных пользователя по userId с использованием AJAX
                    fetch(`/get-user-data/${userId}`)
                        .then(response => response.json())
                        .then(({ update_user_name, update_user_email, update_user_address, update_user_level }) => {
                            document.querySelector('#modalUpdateUserForm form').action = `/users/${userId}`;
                            document.querySelector('#update_user_name').value = update_user_name;
                            document.querySelector('#update_user_email').value = update_user_email;
                            document.querySelector('#update_user_address').value = update_user_address;
                            document.querySelector('#update_user_level').value = update_user_level;
                        });
                });
            });
        });
    </script>

@endsection
