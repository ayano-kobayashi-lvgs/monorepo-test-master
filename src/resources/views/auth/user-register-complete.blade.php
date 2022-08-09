@extends('layouts.app')
@section('title', 'ユーザ登録')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<body>
    <div class="c-section p-register">
        <div class="c-section__inner">
            <div class="c-section__box">
                <div class="c-section__boxInner p-register__boxInner">
                    <h1 class="c-section__title p-regist__title">
                        ユーザ登録完了
                    </h1>
                    <p class="c-section__body">ユーザ登録が完了しました。</p>
                    <div class="c-section__btnWrap">
                        <p
                            class="c-btn c-section__btn c-section__btn--small">
                            <a href="">ログイン</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
