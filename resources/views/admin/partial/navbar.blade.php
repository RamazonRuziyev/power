<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex  align-items-center">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="" class="nav-link">Home</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Aloqa</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="{{route('logout')}}" class="nav-link">Chiqish</a>--}}
{{--        </li>--}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Profil Chiqish</button>
        </form>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">
                    @if($petition_count == 0)

                    @else
                        {{$petition_count}}
                    @endif
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
{{--                <div class="dropdown-divider"></div>--}}
                <div class="dropdown-divider"></div>
                @foreach($petitions as $petition)
                <a href="{{route('notification.show',$petition)}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>
                    <span>{{$petition->fio}}</span>
                    <span class="pull-right">{{date('Y/m/d')}}</span>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="{{route('dashboard_notifications')}}" class="dropdown-item dropdown-footer">Barcha xabarlar</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
{{--                <i class="fas fa-th-large"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
