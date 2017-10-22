<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/')?'active':''}}">
                    <a href="{{route('index')}}">Início</a>
                </li>
                <li class="{{Request::is('imoveis*')?'active':''}}">
                    <a href="{{route('pages.properties.index')}}">Imóveis</a>
                </li>
                {{--
                <li class="{{Request::is('agencies.*')?'active':''}}">
                    <a href="{{route('agencies.index')}}">Agências</a>
                </li>
                --}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest

            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('admin.index')}}">Área Administrativa</a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>