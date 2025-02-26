<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('profiles')}}" class="brand-link">
        <img src="{{asset('profile/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Profil</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <a href="{{route('setting')}}">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                    <img src="{{ Storage::url('public/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{asset('profile/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
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
                            Ariza
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{(request()->is('profiles/petition/create') || request()->is('profiles/petition') )? 'd-block' : ''}}
                        ">
                        <li class="nav-item">
                            <a style="color: {{request()->is('profiles/petition/create') ? 'blue' : ''}}" href="{{route('petition.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ariza yuborish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: {{request()->is('profiles/petition') ? 'blue' : ''}}"  class="nav-link" href="{{route('petition.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ariza Ko'rish</p>
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
