@extends('voyager::master')

@section('content')
<div class="container">
    <h1>Добавить категорию</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Наименование категории</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
</div>
@endsection
