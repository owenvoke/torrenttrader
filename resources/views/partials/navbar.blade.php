<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#main-nav" aria-controls="main-nav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main-nav">

        <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                <span class="fa fa-fw fa-search"></span>
            </button>
        </form>

        <form class="navbar-nav my-2 my-lg-0">
            {{-- Navbar Dropdown/Link Elements --}}
            @include('partials.navbar.torrents')


            @auth
                <div class="nav-item">
                    <p class="navbar-text">
                        <span class="fa fa-fw fa-user"></span>
                        {{ Auth::user()->name }}
                    </p>
                </div>
                <div class="nav-item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" class="hide">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endauth
            @guest
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                </div>
            @endguest
        </form>
    </div>
</nav>