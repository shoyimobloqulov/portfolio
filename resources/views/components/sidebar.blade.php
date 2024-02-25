<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name ?? "Mavjud emas" }}</p>
                @if(Cache::has('user-is-online-' . auth()->user()->id))
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                @else
                    <a href="#"><i class="fa fa-circle text-error"></i> Ofline</a>
                @endif
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Izlash...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Sayt malumotlari</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>Bloglar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('blogs.index') }}"><i class="fa fa-circle-o"></i> Ko'rish</a></li>
                    <li><a href="{{ route('blogs.create') }}"><i class="fa fa-circle-o"></i> Qo'shish</a></li>
                </ul>
            </li>
            <li class="treeview {{ (Request::is('category*') || Request::is('colors*') || Request::is('countries*') || Request::is('regions*') || Request::is('districts*') || Request::is('villages*')) ? 'active':''}}">
                <a href="#">
                    <i class="fa fa-paint-brush"></i>
                    <span>Loyiha ma'lumotlari</span>
                    <span class="pull-right-container">
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('category*') ? 'active' :'' }}"><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Katigoriyalar</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
