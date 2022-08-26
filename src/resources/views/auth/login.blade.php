<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ __('user.todo_login') }}</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="{{ asset('/img/gopher.gif') }}" type="image/gif" >
    </head>
    <body>
        <div class="c-section p-login">
            <div class="c-section__inner">
                <div class="c-section__box p-login__box">
                    <div class="c-section__boxInner p-login__boxInner">
                        <h1 class="c-section__title p-login__title">
                            {{ __('user.todo_login') }}
                        </h1>
                        <form
                            class="c-section__form"
                            action="{{ route('auth.login', ['lang' => session('locale')]) }}"
                            method="post">
                            @csrf
                            @if(session('isLoginError'))
                            <p class="c-section__formError">{{ __('user.login_error') }}</p>
                            @endif
                            <div class="c-section__formItem p-login__formItem">
                                <div class="c-section__formTitleWrap">
                                    <label class="c-section__formTitle">{{ __('user.mailaddress') }}</label>
                                </div>
                                <div class="c-section__formBox">
                                    <input
                                        class="c-form__inner"
                                        type="email"
                                        name="email"
                                        maxlength="254"
                                        required>
                                </div>
                                <p class="c-section__formError">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="c-section__formItem p-login__formItem">
                                <div class="c-section__formTitleWrap">
                                    <label class="c-section__formTitle">{{ __('user.password') }}</label>
                                </div>
                                <div class="c-section__formBox">
                                    <input
                                        class="c-form__inner"
                                        type="password"
                                        name="password"
                                        required>
                                </div>
                                <p class="c-section__formError">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="c-section__btnWrap">
                                <button
                                    class="c-btn c-section__btn c-section__btn--big"
                                    type="submit"
                                    name="action"
                                    value="send">
                                    {{ __('user.login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                @foreach(App\Enums\Locale::getLocaleValues() as $localeValue)
                <a
                    class="c-section__lang"
                    href="{{ route(Route::currentRouteName(), ['lang' => $localeValue]) }}">
                    {{ __("languages.".$localeValue) }}
                </a>
                @endforeach
            </div>
        </div>
    </body>
</html>
