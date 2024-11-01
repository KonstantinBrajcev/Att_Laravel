<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // Загружаем все категории
    return view('products.edit', compact('product', 'categories'));
}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('voyager.products.index')->with('success', 'Продукт обновлен успешно!');
    }
    public function destroy($id)
    {
        // Находим категорию по ID
        $product = Product::findOrFail($id);
        // Удаляем категорию
        $product->delete();
        // Перенаправляем с сообщением об успехе
        return redirect()->route('products.index')->with('success', 'Продукт удален успешно!');
    }
    public function create()
    {
        $categories = Category::all(); // Получаем все категории для выпадающего списка
        return view('products.create', compact('categories')); // Создайте файл create.blade.php
    }

    // Метод для обработки формы добавления продукта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Валидация
            'sku' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Проверяем, что категория существует
        ]);

        // Создаем новый продукт
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Продукт добавлен успешно!');
    }
    public function show($id)
{
    $product = Product::with('category')->findOrFail($id); // Загружаем продукт с категорией
    return view('products.show', compact('product'));
}
}
