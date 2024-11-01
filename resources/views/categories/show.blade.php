@extends('voyager::master')

@section('content')
    <div class="container">
        <h1>Просмотр категории: {{ $category->name }}</h1>

        <div class="form-group">
            <label>ID:</label>
            <p>{{ $category->id }}</p>
        </div>
        <div class="form-group">
            <label>Название:</label>
            <p>{{ $category->name }}</p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-primary">Назад к списку</a>
    </div>
@endsection
