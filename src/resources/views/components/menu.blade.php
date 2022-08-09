<nav class="navbar-light mb-3 c-menu">
    <a class="navbar-brand c-menu__title" href="{{ url('todo') }}">Todoリスト</a>
    @auth
    <div class="c-menu__itemWrap">
        <p class="c-menu__text">こんにちは、{{ $name }}さん</p>
        <p class="c-btn c-menu__btn">
            <a
                href="{{ route('auth.logout') }}">
                ログアウト
            </a>
        </p>
    </div>
    @endauth
</nav>
