<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_method'=>'required',
        ]);

        $products = json_decode($request->input('sale_products'));
        $saleMethod = $request->input('sale_method');
        $saleDetails = $request->input('sale_details');
        foreach ($products as $product) {
            $name = $product->name;
            $price = $product->price;
            $quantity = $product->quantity;

            $sale = new Sale();
            $sale->name = $name;
            $sale->amount = $price * $quantity;
            $sale->method = $saleMethod;
            $sale->quantity = $quantity;
            $sale->details = $saleDetails;
            $sale->save();

            Log::info('Пользователь с ID ' . auth()->user()->id . ' создал продажу с ID ' . $sale->id . "\n" . "\n" .
                'Пользователь:' . "\n" .
                'Имя: ' . auth()->user()->name . "\n" .
                'E-mail: ' . auth()->user()->email. "\n" .
                'Адрес: ' . auth()->user()->address. "\n" .
                'Уровень: ' . auth()->user()->level. "\n" .
                'Создан: ' . auth()->user()->created_at . "\n" .
                'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
                'Продажа:' . "\n" .
                'Название: ' . $sale->name . "\n" .
                'Сумма: ' . $sale->amount . "\n" .
                'Метод оплаты: ' . $sale->method . "\n" .
                'Количество: ' . $sale->quantity . "\n" .
                'Детали: ' . $sale->details . "\n" .
                'Создана: ' . $sale->created_at . "\n" .
                'Изменена: '. $sale->updated_at);
        }
        return redirect()->back()->with('status_success', 'Продажа успешно создана.');
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'update_sale_name' => 'required|string|min:3|max:32',
            'update_sale_amount' => 'required|numeric',
            'update_sale_method' => 'required',
            'update_sale_quantity' => 'required|numeric',
        ]);

        Log::info('Пользователь с ID ' . auth()->user()->id . ' изменил продажу с ID ' . $sale->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'До:' . "\n" .
            'Название: ' . $sale->name . "\n" .
            'Сумма: ' . $sale->amount . "\n" .
            'Метод оплаты: ' . $sale->method . "\n" .
            'Количество: ' . $sale->quantity . "\n" .
            'Детали: ' . $sale->details . "\n" .
            'Создана: ' . $sale->created_at . "\n" .
            'Изменена: '. $sale->updated_at . "\n" . "\n" .
            'После:' . "\n" .
            'Название: ' . $request->input('update_sale_name') . "\n" .
            'Сумма: ' . $request->input('update_sale_amount') . "\n" .
            'Метод оплаты: ' . $request->input('update_sale_method') . "\n" .
            'Количество: ' . $request->input('update_sale_quantity') . "\n" .
            'Детали: ' . $request->input('update_sale_details') . "\n" .
            'Создана: ' . $sale->created_at . "\n" .
            'Изменена: '. now());

        $sale->name = $request->input('update_sale_name');
        $sale->amount = $request->input('update_sale_amount');
        $sale->method = $request->input('update_sale_method');
        $sale->quantity = $request->input('update_sale_quantity');
        $sale->details = $request->input('update_sale_details');
        $sale->save();

        return redirect()->route('sales')->with('status_success', 'Информация о продаже успешно обновлена.');
    }

    public function getSaleData(Sale $sale)
    {
        return response()->json([
            'update_sale_name' => $sale->name,
            'update_sale_amount' => $sale->amount,
            'update_sale_quantity' => $sale->quantity,
            'update_sale_details' => $sale->details,
        ]);
    }

    public function destroy(Sale $sale)
    {
        Log::info('Пользователь с ID ' . auth()->user()->id . ' удалил продажу с ID ' . $sale->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Продажа:' . "\n" .
            'Название: ' . $sale->name . "\n" .
            'Сумма: ' . $sale->amount . "\n" .
            'Метод оплаты: ' . $sale->method . "\n" .
            'Количество: ' . $sale->quantity . "\n" .
            'Детали: ' . $sale->details . "\n" .
            'Создана: ' . $sale->created_at . "\n" .
            'Изменена: '. $sale->updated_at);
        $sale->delete();
        return redirect()->route('sales')->with('status_success', 'Продажа успешно удалена.');
    }
}
