<header>
    <nav class="main-nav">
        <a href="{{route('entries.index')}}" class="nav__brand">Blog App</a>
        <ul class="nav__items">
            @guest
                <li class="nav__item">
                    <a href="{{route('login')}}" class="">Login</a>
                </li>
                <li class="nav__item">
                    <a href="{{route('register')}}" class="">Register</a>
                </li>
            @endguest

            @auth
                <li class="nav__item">
                    <a href="{{route('entries.create')}}">Create Entry</a>
                </li>
                <li class="nav__item"> 
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:{}" onclick="event.preventDefault(); this.closest('form').submit()">{{ __('Logout') }}</a>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
