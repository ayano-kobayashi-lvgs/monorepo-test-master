@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                詳細画面
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <td>{{$todo->id}}</td>
                    </tr>
                    <tr>
                        <td>title</td>
                        <td>{{$todo->title}}</td>
                    </tr>
                </table>
                <a 
                    class="btn btn-info"            
                    href="{{ url('todos') }}">
                    戻る
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
