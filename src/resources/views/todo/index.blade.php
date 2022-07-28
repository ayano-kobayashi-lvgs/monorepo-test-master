@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                一覧画面
            </div>
            <div class="card-body">
                @if (session('status'))
                <div 
                    class="alert alert-success"
                    role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a 
                    class="btn btn-success mb-3"
                    href="{{ url('todos/create') }}">
                    登録
                </a>
                <table class="table">
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
                                    href="{{ url('todos/' . $todo->id) }}">
                                    詳細
                                </a>
                            </td>
                            <td>
                                <a 
                                    class="btn btn-primary"
                                    href="{{ url('todos/' . $todo->id . '/edit') }}">
                                    編集
                                </a>
                            </td>
                            <td>
                                <form
                                    method="POST"
                                    action="/todos/{{ $todo->id }}"
                                    href="{{ url('todos/' . $todo->id . '/delete') }}">
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
@endsection
