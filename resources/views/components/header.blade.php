<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <span class="logo-mini"><b>A</b></span>
        <span class="logo-lg"><b>Admin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Navigatsiyani yoqish/yopish</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown  user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span>{{ auth()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('profile.edit') }}">Profil</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form action="{{ route('logout') }}"  id="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class='fa fa-sign-out'></i> Chiqish</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
