@extends('voyager::master')

@section('content')
    <h1>Список категорий</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Редактировать</a>
                        <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить категорию</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }} <!-- Для постраничной навигации -->
@endsection
