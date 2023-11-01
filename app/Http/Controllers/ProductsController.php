<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|string|min:3|max:32',
            'product_price' => 'required|numeric',
            'product_address'=>'required|string',
        ]);

        $product = Product::create([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'address'=> $request->product_address,
        ]);
        Log::info('Пользователь с ID ' . auth()->user()->id . ' создал товар с ID ' . $product->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Товар:' . "\n" .
            'Название: ' . $product->name . "\n" .
            'Цена: ' . $product->price . "\n" .
            'Адрес: ' . $product->address . "\n" .
            'Создан: ' . $product->created_at . "\n" .
            'Изменен: '. $product->updated_at);
        return redirect()->route('products')->with('status_success', 'Товар успешно создан.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'update_product_name' => 'required|string|min:3|max:32',
            'update_product_price' => 'required|numeric',
            'update_product_address' => 'required|string',
        ]);

        Log::info('Пользователь с ID ' . auth()->user()->id . ' изменил товар с ID ' . $product->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'До:' . "\n" .
            'Название: ' . $product->name . "\n" .
            'Цена: ' . $product->price . "\n" .
            'Адрес: ' . $product->address . "\n" .
            'Создан: ' . $product->created_at . "\n" .
            'Изменен: '. $product->updated_at . "\n" . "\n" .
            'После:' . "\n" .
            'Название: ' . $request->input('update_product_name') . "\n" .
            'Цена: ' . $request->input('update_product_price') . "\n" .
            'Адрес: ' . $request->input('update_product_address') . "\n" .
            'Создан: ' . $product->created_at . "\n" .
            'Изменен: '. now());

        $product->name = $request->input('update_product_name');
        $product->price = $request->input('update_product_price');
        $product->address = $request->input('update_product_address');
        $product->save();

        return redirect()->route('products')->with('status_success', 'Информация о товаре успешно обновлена.');
    }

    public function getProductData(Product $product)
    {
        return response()->json([
            'update_product_name' => $product->name,
            'update_product_price' => $product->price,
            'update_product_address' => $product->address,
        ]);
    }

    public function destroy(Product $product)
    {
        Log::info('Пользователь с ID ' . auth()->user()->id . ' удалил товар с ID ' . $product->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Товар:' . "\n" .
            'Название: ' . $product->name . "\n" .
            'Цена: ' . $product->price . "\n" .
            'Адрес: ' . $product->address . "\n" .
            'Создан: ' . $product->created_at . "\n" .
            'Изменен: '. $product->updated_at);
        $product->delete();
        return redirect()->route('products')->with('status_success', 'Товар успешно удален.');
    }
}
