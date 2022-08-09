@extends("layouts.app")
@section('title', 'Todo一覧')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header c-table__title">
                一覧画面
            </div>
            <div class="card-body">
                @if(session('status'))
                <div 
                    class="alert alert-success c-table__msg"
                    role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a 
                    class="btn btn-success mb-3"
                    href="{{ route('todos.create') }}">
                    登録
                </a>
                <table class="table c-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($todos as $todo)
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>
                                <a 
                                    class="btn btn-info"
                                    href="{{ route('todos.show', ['id' => $todo->id]) }}">
                                    詳細
                                </a>
                            </td>
                            <td>
                                <a 
                                    class="btn btn-primary"
                                    href="{{ route('todos.edit', ['id' => $todo->id]) }}">
                                    編集
                                </a>
                            </td>
                            <td>
                                <form
                                    method="POST"
                                    action="/todos/{{ $todo->id }}"
                                    href="{{ route('todos.delete', ['id' => $todo->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
