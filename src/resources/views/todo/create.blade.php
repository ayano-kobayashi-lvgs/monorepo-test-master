@extends("layouts.app")
@section('title', 'Todo登録')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    登録画面
                </div>
                <div class="card-body">
                    <form
                        class="c-form"
                        method="POST"
                        action="{{ route('todos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label
                                for="title"
                                class="control-label">
                                タイトル
                            </label>
                            <input
                                class="form-control"
                                name="title"
                                type="text">
                        </div>
                        <button
                            class="btn btn-primary"
                            type="submit">
                            登録
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
