@extends('voyager::master')

@section('content')
    <h1>Список продуктов</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category ? $product->category->name : 'Нет категории' }}</td>
                    <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
                        <a href="{{ route('products.create') }}" class="btn btn-success">Добавить продукт</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }} <!-- Для постраничной навигации -->
@endsection
