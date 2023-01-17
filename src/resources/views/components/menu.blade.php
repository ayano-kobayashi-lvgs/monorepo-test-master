<nav class="navbar-light mb-3 c-menu">
    <a class="navbar-brand c-menu__title" href="{{ url('todo') }}">{{ __('todo.todo_list') }}</a>
    @auth
    <div class="c-menu__itemWrap">
        <p class="c-menu__text">{{ __('todo.hello') }}{{ $name }}{{ __('todo.mr_or_ms') }}</p>
        <p class="c-btn c-menu__btn">
            <a
                href="{{ route('auth.logout', ['lang' => session('locale')]) }}">
                {{ __('todo.logout') }}
            </a>
        </p>
    </div>
    @endauth
</nav>
