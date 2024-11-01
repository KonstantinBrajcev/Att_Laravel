@extends('voyager::master')

@section('content')
    <div class="container">
        <h1>Редактирование продукта</h1>

        <!-- Форма отправляется на маршрут update с методом PUT -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Поле для названия продукта -->
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <!-- Поле для выбора категории продукта -->
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Поле для SKU продукта -->
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $product->sku) }}" required>
            </div>

            <!-- Кнопка для сохранения изменений -->
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
