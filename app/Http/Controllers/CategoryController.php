<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function edit($id)
    {
        // Правильное имя переменной
        $category = Category::findOrFail($id);
        // dd($category);
        return view('categories.edit', compact('category')); // Передаем правильную переменную
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255', // Валидация
        // ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Категория обновлена успешно!');
    }

    public function destroy($id)
    {
        // Находим категорию по ID
        $category = Category::findOrFail($id);
        // Удаляем категорию
        $category->delete();
        // Перенаправляем с сообщением об успехе
        return redirect()->route('categories.index')->with('success', 'Категория удалена успешно!');
    }

    public function create()
    {
        return view('categories.create'); // Создайте файл create.blade.php
    }

    // Метод для обработки формы добавления категории
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Валидация
        ]);
        // Создаем новую категорию
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория добавлена успешно!');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id); // Загружаем категорию
        return view('categories.show', compact('category'));
    }

}
