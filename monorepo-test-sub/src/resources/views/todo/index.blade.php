@extends("layouts.app")
@section('title', __('todo.todo_list'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header c-table__title">
                {{ __('todo.list') }}
            </div>
            <div class="card-body">
                @if(session('status'))
                <div
                    class="alert alert-success c-table__msg"
                    role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @can('isAdmin')
                <a
                    class="btn btn-success mb-3"
                    href="{{ route('todos.create', ['lang' => session('locale')]) }}">
                    {{ __('todo.register') }}
                </a>
                @endcan
                <table class="table c-table">
                    <thead>
                        <tr>
                            <th>{{ __('todo.id') }}</th>
                            <th>{{ __('todo.title') }}</th>
                            <th></th>
                            @can('isAdmin')
                            <th></th>
                            <th></th>
                            @endcan
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
                                    href="{{ route('todos.show', ['lang' => session('locale'), 'id' => $todo->id]) }}">
                                    {{ __('todo.details') }}
                                </a>
                            </td>
                            @can('isAdmin')
                            <td>
                                <a
                                    class="btn btn-primary"
                                    href="{{ route('todos.edit', ['lang' => session('locale'), 'id' => $todo->id]) }}">
                                    {{ __('todo.edit') }}
                                </a>
                            </td>
                            <td>
                                <form
                                    method="POST"
                                    action="{{ route('todos.delete', ['lang' => session('locale'), 'id' => $todo->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">{{ __('todo.delete') }}</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
