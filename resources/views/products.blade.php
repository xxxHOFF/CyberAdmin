@extends('layout')

@section('content')

    <div class="vh-100" style = "margin-top: 15vh">
        <div class="row justify-content-center" style="margin-right: 0">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-white">Товары <button class="btn btn-outline-warning btn-icon" data-bs-toggle="modal" data-bs-target="#modalCreateProductForm" id="openCreateProductForm"><i class="bi bi-plus"></i></button></h2>
            </div>
        </div>
        <table class="table table-dark table-hover text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Адрес</th>
                <th>Создан</th>
                <th>Изменен</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($products as $product)
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->address }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-icon open-update-modal" data-bs-toggle="modal" data-bs-target="#modalUpdateProductForm" data-product-id="{{ $product->id }}" id="openUpdateProductForm"><i class="bi bi-list"></i></button>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
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
            <h2 class="text-white">Всего {{ count($products) }}</h2>
        </div>
    </div>

    <div class="modal fade" id="modalCreateProductForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Создание Товара</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" id="product_name" name="product_name" class="form-control rounded-3 text-white {{ $errors->has('product_name') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('product_name') }}" required>
                            <label for="product_name" class="text-white">Название</label>
                            @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" id="product_price" name="product_price" class="form-control rounded-3 text-white {{$errors->has('product_price') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('product_price') }}" required min="1" max="999">
                            <label for="product_price" class="text-white">Цена</label>
                            @error('product_price')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="product_address" name="product_address" class="form-control text-white {{ $errors->has('product_address') ? 'is-invalid' : '' }}" aria-label="Точка работы" required>
                                <option value="" selected disabled>Выберите адрес</option>
                                <option value="Пл. Максима Горького, 4" {{ old('product_address') == 'Пл. Максима Горького, 4' ? 'selected' : '' }}>Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" {{ old('product_address') == 'Коминтерна, 123' ? 'selected' : '' }}>Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" {{ old('product_address') == 'Мещерский бульвар, 7' ? 'selected' : '' }}>Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" {{ old('product_address') == 'Пр. Ленина, 28' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" {{ old('product_address') == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр.Молодежный, 2Б</option>
                                <option value="пр. Октября, 25" {{ old('product_address') == 'пр. Октября, 25' ? 'selected' : '' }}>пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" {{ old('product_address') == 'Казанское шоссе, 5' ? 'selected' : '' }}>Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" {{ old('product_address') == 'Пр. Гагарина, 212А' ? 'selected' : '' }}>Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" {{ old('product_address') == 'Белинского, 106А' ? 'selected' : '' }}>Белинского, 106А</option>
                            </select>
                            @error('product_address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning text-white click-btn" type="submit">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($product))
    <div class="modal fade" id="modalUpdateProductForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow text-white">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Изменение товара</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('products.update', $product) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-4">
                            <input type="text" id="update_product_name" name="update_product_name" class="form-control rounded-3 text-white {{ $errors->has('update_product_name') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_product_name') }}" required>
                            <label for="update_product_name" class="text-white">Название</label>
                            @error('update_product_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" id="update_product_price" name="update_product_price" class="form-control rounded-3 text-white {{ $errors->has('update_product_price') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_product_price') }}" required min="1" max="999">
                            <label for="update_product_price" class="text-white">Цена</label>
                            @error('update_product_price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select id="update_product_address" name="update_product_address" class="form-control text-white {{ $errors->has('update_product_address') ? 'is-invalid' : '' }}" aria-label="Точка работы" required>
                                <option value="" selected disabled>Выберите адрес</option>
                                <option value="Пл. Максима Горького, 4" {{ old('update_product_address', $product->address) == 'Пл. Максима Горького, 4' ? 'selected' : '' }}>Пл. Максима Горького, 4</option>
                                <option value="Коминтерна, 123" {{ old('update_product_address', $product->address) == 'Коминтерна, 123' ? 'selected' : '' }}>Коминтерна, 123</option>
                                <option value="Мещерский бульвар, 7" {{ old('update_product_address', $product->address) == 'Мещерский бульвар, 7' ? 'selected' : '' }}>Мещерский бульвар, 7</option>
                                <option value="Пр. Ленина, 28" {{ old('update_product_address', $product->address) == 'Пр. Ленина, 28' ? 'selected' : '' }}>Пр. Ленина, 28</option>
                                <option value="Пр.Молодежный, 2Б" {{ old('update_product_address', $product->address) == 'Пр.Молодежный, 2Б' ? 'selected' : '' }}>Пр.Молодежный, 2Б</option>
                                <option value="пр. Октября, 25" {{ old('update_product_address', $product->address) == 'пр. Октября, 25' ? 'selected' : '' }}>пр. Октября, 25</option>
                                <option value="Казанское шоссе, 5" {{ old('update_product_address', $product->address) == 'Казанское шоссе, 5' ? 'selected' : '' }}>Казанское шоссе, 5</option>
                                <option value="Пр. Гагарина, 212А" {{ old('update_product_address', $product->address) == 'Пр. Гагарина, 212А' ? 'selected' : '' }}>Пр. Гагарина, 212А</option>
                                <option value="Белинского, 106А" {{ old('update_product_address', $product->address) == 'Белинского, 106А' ? 'selected' : '' }}>Белинского, 106А</option>
                            </select>
                            @error('update_product_address')
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

            @if($errors->has('product_name') || $errors->has('product_price') || $errors->has('product_address'))
            document.getElementById('openCreateProductForm').click();
            @elseif($errors->has('update_product_name') || $errors->has('update_product_price') || $errors->has('update_product_address'))
            document.getElementById('openUpdateProductForm').click();
            @endif

            document.querySelectorAll('.open-update-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const productId = button.getAttribute('data-product-id');

                    // Загрузка данных пользователя по userId с использованием AJAX
                    fetch(`/get-product-data/${productId}`)
                        .then(response => response.json())
                        .then(({ update_product_name, update_product_price, update_product_address }) => {
                            document.querySelector('#modalUpdateProductForm form').action = `/products/${productId}`;
                            document.querySelector('#update_product_name').value = update_product_name;
                            document.querySelector('#update_product_price').value = update_product_price;
                            document.querySelector('#update_product_address').value = update_product_address;
                        });
                });
            });
        });
    </script>

@endsection
