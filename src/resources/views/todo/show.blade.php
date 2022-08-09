@extends("layouts.app")
@section('title', 'Todo詳細')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<x-menu />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header c-table__title">
                    詳細画面
                </div>
                <div class="card-body">
                    <table class="table c-table">
                        <tr>
                            <th>id</th>
                            <td>{{$todo->id}}</td>
                        </tr>
                        <tr>
                            <th>title</th>
                            <td>{{$todo->title}}</td>
                        </tr>
                    </table>
                    <a
                        class="btn btn-info"
                        href="{{ route('todos.index') }}">
                        戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
