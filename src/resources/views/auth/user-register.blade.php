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
                    <h1 class="c-section__title">
                        {{ __('user.user_register') }}
                    </h1>
                    <form
                        class="c-section__form p-register__form"
                        action="{{ route('auth.completeRegister', ['lang' => session('locale')]) }}"
                        method="POST">
                        @csrf
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">{{ __('user.full_name') }}</label>
                                <span class="c-section__formLabel c-section__formLabel--required">{{ __('user.required') }}</span>
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
                                <label class="c-section__formTitle">{{ __('user.mailaddress') }}</label>
                                <span class="c-section__formLabel c-section__formLabel--required">{{ __('user.required') }}</span>
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
                                <label class="c-section__formTitle">{{ __('user.password') }}</label>
                                <span class="c-section__formLabel c-section__formLabel--required">{{ __('user.required') }}</span>
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
                                <label class="c-section__formTitle">{{ __('user.password_confirmation') }}</label>
                                <span class="c-section__formLabel c-section__formLabel--required">{{ __('user.required') }}</span>
                            </div>
                            <div class="c-section__formBox">
                                <input
                                    class="c-form__inner"
                                    type="password"
                                    name="password_confirmation">
                            </div>
                            <p class="c-section__formError">{{ $errors->first('password_confirmation') }}</p>
                        </div>
                        <div class="c-section__formItem">
                            <div class="c-section__formTitleWrap">
                                <label class="c-section__formTitle">{{ __('user.role') }}</label>
                                <span class="c-section__formLabel c-section__formLabel--required">{{ __('user.required') }}</span>
                            </div>
                            <div class="c-section__formBox">
                                @foreach(App\Enums\Role::getRoleValues() as $roleValue)
                                <input
                                    id="{{ $roleValue }}"
                                    class="c-section__radioBtn"
                                    type="radio"
                                    name="role"
                                    value="{{ $roleValue }}">
                                <label
                                    for="{{ $roleValue }}"
                                    class="c-section__radioBtnLabel">
                                    {{ __("user.${roleValue}") }}
                                </label>
                                @endforeach
                            </div>
                            <p class="c-section__formError">{{ $errors->first('role') }}</p>
                        </div>
                        <div class="c-section__btnWrap">
                            <button
                                class="c-btn c-section__btn c-section__btn--big"
                                type="submit"
                                name="action"
                                value="send">
                                {{ __('user.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
