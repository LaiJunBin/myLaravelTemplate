<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topMenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
        <a href="@yield('brandUrl')" class="brand navbar-brand">@yield('brandName')</a>
        <div class="collapse navbar-collapse" id="topMenu">
            <ul class="nav navbar-nav">
                @yield('navMenu')
            </ul>
        </div>
    </div>
</nav>