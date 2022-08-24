@extends("layouts.app")
@section('title', __('todo.todo_register'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    {{ __('todo.register_page') }}
                </div>
                <div class="card-body">
                    <form
                        class="c-form"
                        method="POST"
                        action="{{ route('todos.store', ['lang' => session('locale')]) }}">
                        @csrf
                        <div class="form-group">
                            <label
                                for="title"
                                class="control-label">
                                {{ __('todo.title') }}
                            </label>
                            <input
                                class="form-control"
                                name="title"
                                type="text">
                        </div>
                        <button
                            class="btn btn-primary"
                            type="submit">
                            {{ __('todo.register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
