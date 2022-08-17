@extends('layouts.app')
@section('title', 'エラー')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection

<body>
    <div class="c-section">
        <div class="c-section__inner">
            <div class="c-section__box">
                <div class="c-section__boxInner p-register__boxInner">
                    <h1 class="c-section__title p-regist__title">
                        {{ trans("errors.${status_code}.title") }}
                    </h1>
                    <p class="c-section__body">
                        {{ trans("errors.${status_code}.message") }}
                    </p>
                    <div class="c-section__btnWrap">
                        <p class="c-btn c-section__btn c-section__btn--small">
                            <a href="{{ route('auth.login') }}">ログインへ</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
