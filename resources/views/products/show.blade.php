@extends('voyager::master')

@section('content')
    <div class="container">
        <h1>Просмотр продукта: {{ $product->name }}</h1>

        <div class="form-group">
            <label>ID:</label>
            <p>{{ $product->id }}</p>
        </div>
        <div class="form-group">
            <label>SKU:</label>
            <p>{{ $product->sku }}</p>
        </div>
        <div class="form-group">
            <label>Категория:</label>
            <p>{{ $product->category ? $product->category->name : 'Нет категории' }}</p>
        </div>
        <div class="form-group">
            <label>Описание:</label>
            <p>{{ $product->description }}</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-primary">Назад к списку</a>
    </div>
@endsection
