<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('superAdmin')}}" class="brand-link">
        <img src="{{asset('profile/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Profil</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <a href="{{route('setting.super')}}">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                        <img src="{{ Storage::url('public/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{asset('profile/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="{{route('setting.super')}}" class="d-block">
                        {{Auth::user()->name}}
                    </a>
                </div>
            </div>
        </a>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{(request()->is('Administrator/user/view') || request()->routeIs('user.edit') )? 'd-block' : ''}}">
                        <li class="nav-item">
                            <a style="color: {{(request()->is('Administrator/user/view') || request()->routeIs('user.edit') )? 'blue' : ''}}" href="{{route('user.view')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User all</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a style="color: {{request()->is('Administrator/user/update') ? 'blue' : ''}}"  class="nav-link" href="">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p><Ar></Ar>iza Ko'rish</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Xodim
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{(request()->is('Administrator/xodim') || request()->is('Administrator/xodin/all/adm') || request()->routeIs('user.show'))? 'd-block' : ''}}">
                        <li class="nav-item">
                            <a style="color: {{request()->is('Administrator/xodim') ? 'blue' : ''}}" href="{{route('user.all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>xodim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: {{(request()->is('Administrator/xodin/all/adm') || request()->routeIs('user.show') )? 'blue' : ''}}" href="{{route('user.adm')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Xomdim all</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Role
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{(request()->is('Administrator/role') || request()->is('Administrator/role/yaratish'))?'d-block' : '' }}">
                        <li class="nav-item">
                            <a style="color: {{request()->is('Administrator/role/yaratish') ? 'blue' : ''}}" href="{{route('role.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role yaratish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: {{request()->is('Administrator/role') ? 'blue' : ''}}" href="{{route('role')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
