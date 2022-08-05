@extends("layouts.app")
@section('title', 'Todo登録')
<x-menu />
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
                type="text"
                >
        </div>
        <button 
            class="btn btn-primary"
            type="submit">
            登録
        </button>
    </form>
</div>
