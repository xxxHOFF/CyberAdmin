@extends('layout')

@section('content')

    <div class="vh-100" style = "margin-top: 15vh">
        <div class="row justify-content-center" style="margin-right: 0">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-white">Продажи</h2>
            </div>
        </div>
        <table class="table table-dark table-hover text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Сумма</th>
                <th>Метод оплаты</th>
                <th>Количество</th>
                <th>Детали</th>
                <th>Создана</th>
                <th>Изменена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($sales as $sale)
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>
                        @if ($sale->method == 1)
                            Наличный
                        @elseif ($sale->method == 2)
                            Безналичный
                        @endif
                    </td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->details }}</td>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-icon open-update-modal" data-bs-toggle="modal" data-bs-target="#modalUpdateSaleForm" data-sale-id="{{ $sale->id }}" id="openUpdateSaleForm"><i class="bi bi-list"></i></button>
                        <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display: inline;">
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
            <h2 class="text-white">Всего {{ count($sales) }}</h2>
        </div>
    </div>

    @if(isset($sale))
        <div class="modal fade" id="modalUpdateSaleForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow text-white">
                    <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                        <h1 class="modal-title w-100 fw-bold mb-0 fs-2">Изменение продажи</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form action="{{ route('sales.update', $sale) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-4">
                                <input type="text" id="update_sale_name" name="update_sale_name" class="form-control rounded-3 text-white {{ $errors->has('update_sale_name') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_sale_name') }}" required>
                                <label for="update_sale_name" class="text-white">Название</label>
                                @error('update_sale_name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" id="update_sale_amount" name="update_sale_amount" class="form-control rounded-3 text-white {{ $errors->has('update_sale_amount') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_sale_amount') }}" required min="1" max="99999">
                                <label for="update_sale_amount" class="text-white">Сумма</label>
                                @error('update_sale_amount')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" id="update_sale_quantity" name="update_sale_quantity" class="form-control rounded-3 text-white {{ $errors->has('update_sale_quantity') ? 'is-invalid' : '' }}" placeholder="" value="{{ old('update_sale_quantity') }}" required min="1" max="999">
                                <label for="update_sale_quantity" class="text-white">Количество</label>
                                @error('update_sale_quantity')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" id="update_sale_details" name="update_sale_details" class="form-control rounded-3 text-white {{$errors->has('update_sale_details') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('update_sale_details') }}">
                                <label for="update_sale_details" class="text-white">Детали</label>
                                @error('update_sale_details')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input {{$errors->has('update_sale_method') ? 'is-invalid' : ''}}" type="radio" name="update_sale_method" id="sale_methodRadio1" value="1">
                                    <label class="form-check-label text-white" for="sale_methodRadio1">Наличный</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input {{$errors->has('update_sale_method') ? 'is-invalid' : ''}}" type="radio" name="update_sale_method" id="sale_methodRadio2" value="2">
                                    <label class="form-check-label text-white" for="sale_methodRadio2">Безналичный</label>
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

            @if($errors->has('update_sale_name') || $errors->has('update_sale_amount') || $errors->has('update_sale_method') || $errors->has('update_sale_quantity') || $errors->has('update_sale_details'))
            document.getElementById('openUpdateSaleForm').click();
            @endif

            document.querySelectorAll('.open-update-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const saleId = button.getAttribute('data-sale-id');

                    // Загрузка данных пользователя по userId с использованием AJAX
                    fetch(`/get-sale-data/${saleId}`)
                        .then(response => response.json())
                        .then(({ update_sale_name, update_sale_amount, update_sale_quantity, update_sale_details }) => {
                            document.querySelector('#modalUpdateSaleForm form').action = `/sales/${saleId}`;
                            document.querySelector('#update_sale_name').value = update_sale_name;
                            document.querySelector('#update_sale_amount').value = update_sale_amount;
                            document.querySelector('#update_sale_quantity').value = update_sale_quantity;
                            document.querySelector('#update_sale_details').value = update_sale_details;
                        });
                });
            });
        });
    </script>

@endsection
