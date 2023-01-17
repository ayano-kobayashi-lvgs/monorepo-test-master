@extends("layouts.app")
@section('title', __('todo.todo_details'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    {{ __('todo.detail_page') }}
                </div>
                <div class="card-body">
                    <table class="table c-table">
                        <tr>
                            <th>{{ __('todo.id') }}</th>
                            <td>{{ $todo->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('todo.title') }}</th>
                            <td>{{ $todo->title }}</td>
                        </tr>
                    </table>
                    <a
                        class="btn btn-info"
                        href="{{ route('todos.index', ['lang' => session('locale')]) }}">
                        {{ __('todo.return') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
