@extends('layouts.app')
@section('title', __('user.user_register'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
<body>
    <div class="c-section p-register">
        <div class="c-section__inner">
            <div class="c-section__box">
                <div class="c-section__boxInner p-register__boxInner">
                    <h1 class="c-section__title p-regist__title">
                        {{ __('user.user_register_completion') }}
                    </h1>
                    <p class="c-section__body">{{ __('user.user_register_completed') }}</p>
                    <div class="c-section__btnWrap">
                        <p
                            class="c-btn c-section__btn c-section__btn--small">
                            <a href="{{ route('auth.login', ['lang' => session('locale')]) }}">{{ __('user.login') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
