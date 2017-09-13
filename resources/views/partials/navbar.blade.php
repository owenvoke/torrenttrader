<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <span class="fa fa-fw fa-play-circle-o"></span>
                <span class="user-colour">{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-main">
            <form class="navbar-form navbar-left" action="{{ route('torrents.index') }}">
                <div class="form-group">
                    <input name="query" class="form-control navbar-search hover-bottom" placeholder="Search">
                </div>
                <button class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li>
                        <p class="navbar-text">
                            <span class="fa fa-fw fa-user"></span>
                            {{ Auth::user()->name }}
                        </p>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}"
                              method="POST" class="hide">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                    <li><a href="{{ route('login') }}">Log In</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>