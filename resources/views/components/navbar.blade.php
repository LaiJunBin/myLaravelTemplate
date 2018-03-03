<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="@yield('brandUrl')" class="brand navbar-brand">@yield('brandName')</a>
        </div>
        <div class="collapse navbar-collapse" id="topMenu">
            @if (session()->has('user_name'))
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav navbar-right"><a href="#">使用者：{{ session('user_name') }}</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-@yield('navbarAlign','left')">
                @yield('navMenu')
            </ul>
        </div>
    </div>
</nav>