@extends("layouts.app")
@section('title', 'Todo編集')
@section('css')
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    編集画面
                </div>
                <div class="card-body">
                    <form
                        class="form-horizontal c-form"
                        method="POST"
                        action="{{ route('todos.update', ['id' => $todo->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div>ID</div>
                            <div>{{ $todo->id }}</div>
                        <hr>
                        <label
                            for="title"
                            class="control-label">
                            タイトル
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
                            更新
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
