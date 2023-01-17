@extends("layouts.app")
@section('title', __('todo.todo_update'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    {{ __('todo.edit_page') }}
                </div>
                <div class="card-body">
                    <form
                        class="form-horizontal c-form"
                        method="POST"
                        action="{{ route('todos.update', ['lang' => session('locale'), 'id' => $todo->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div>{{ __('todo.id') }}</div>
                            <div>{{ $todo->id }}</div>
                        <hr>
                        <label
                            for="title"
                            class="control-label">
                            {{ __('todo.title') }}
                        </label>
                        <input
                            class="form-control"
                            name="title"
                            type="text"
                            value="{{ $todo->title }}">
                        </div>
                        <button
                            class="btn btn-primary"
                            type="submit">
                            {{ __('todo.update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
