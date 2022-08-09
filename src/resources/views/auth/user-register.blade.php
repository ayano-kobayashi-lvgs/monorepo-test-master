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
                    <h1 class="c-section__title">
                        ユーザ登録
                    </h1>
                    <form
                        class="c-section__form p-register__form"
                        action="{{ route('auth.completeRegister') }}"
                        method="POST">
                        @csrf
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">氏名</label>
                                <span class="c-section__formLabel c-section__formLabel--required">必須</span>
                            </div>
                            <div class="c-section__formBox">
                                <input
                                    class="c-form__inner"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    maxlength="60">
                            </div>
                            <p class="c-section__formError">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">メールアドレス</label>
                                <span class="c-section__formLabel c-section__formLabel--required">必須</span>
                            </div>
                            <div class="c-section__formBox">
                                <input
                                    class="c-form__inner"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    maxlength="254">
                            </div>
                            <p class="c-section__formError">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">パスワード</label>
                                <span class="c-section__formLabel c-section__formLabel--required">必須</span>
                            </div>
                            <div class="c-section__formBox">
                                <input
                                    class="c-form__inner"
                                    type="password"
                                    name="password">
                            </div>
                            <p class="c-section__formError">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">パスワード(確認)</label>
                                <span class="c-section__formLabel c-section__formLabel--required">必須</span>
                            </div>
                            <div class="c-section__formBox">
                                <input
                                    class="c-form__inner"
                                    type="password"
                                    name="password_confirmation">
                            </div>
                            <p class="c-section__formError">{{ $errors->first('password_confirmation') }}</p>
                        </div>
                        <div class="c-section__btnWrap">
                            <button
                                class="c-btn c-section__btn c-section__btn--big"
                                type="submit"
                                name="action"
                                value="send">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
