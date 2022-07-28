@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form
                    class="form-horizontal"
                    method="POST"
                    action="/todos/{{ $todo->id }}">
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
                        value="{{ $todo->title }}"
                        >
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
@endsection
