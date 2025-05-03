<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
        <img src="{{asset('profile/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Profil</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <a href="{{route('admin.setting')}}">
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
                            Arizalar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{(request()->is('dashboard/petition_accept') || request()->is('dashboard/petition_cancel'))? 'd-block' : ''}} ">
                        <li class="nav-item">
                            <a style="color: {{request()->is('dashboard/petition_accept') ? 'blue' : ''}}" href="{{route('petition_accept')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Qabul qiling ariza</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: {{request()->is('dashboard/petition_cancel') ? 'red' : ''}}"  class="nav-link" href="{{route('petition_cancel')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>bekor qilish ariza</p>
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
