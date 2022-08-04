<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ユーザ登録完了</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="{{ asset('/img/gopher.gif') }}" type="image/gif" >
  </head>
  <body>
    <div class="c-section">
        <div class="c-section__inner">
            <div class="c-section__box p-regist__box">
                <div class="c-section__boxInner">
                    <h1 class="c-section__title p-regist__title">
                        ユーザ登録完了
                    </h1>
                    <p class="c-section__body">ユーザ登録が完了しました。</p>
                    <div class="c-section__btnWrap">
                        <p
                            class="c-btn c-section__btn c-section__btn--small">
                            <a href="{{ route('auth.login') }}">ログイン</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
