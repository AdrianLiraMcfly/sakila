<!-- Sidebar -->
<!-- Brand Logo -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(to bottom, #000000, #333333); position: fixed; top: 0; left: 0; height: 100%; overflow-y: auto;">
      
<a href="#" class="brand-link">
        <img src="dist/img/icon.png" alt="Cinema Studio Logo" class="brand-image img-circle elevation-3" style="opacity: .8; filter: invert(1);">
        <span class="brand-text font-weight-light">Sakila Movies</span>
        </a>
<div class="sidebar" style="background: linear-gradient(to bottom, #1a1a1a, #4d4d4d);">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{route('home')}}" class="d-block" style="color: #00ff00;">Dashboard</a>
        </div>
    </div>

    @csrf
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
        <div class="sidebar-menu-wrapper" style="max-height: 400px; overflow-y: auto;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active" style="background-color: #00ff00 !important; color: #1a1a1a !important; border-radius: 5px;">
                        <i class="nav-icon fas fa-film" style="color: #1a1a1a !important;"></i>
                        <p>
                            Sakila Movies
                            <i class="right fas fa-angle-left" style="color: #1a1a1a !important;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Actors -->
                        <li class="nav-item">
                            <a href="{{ route('actors.index') }}" class="nav-link {{ Request::is('actors*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Actors</p>
                            </a>
                        </li>

                        <!-- Films -->
                        <li class="nav-item">
                            <a href="{{ route('films.index') }}" class="nav-link {{ Request::is('films*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Films</p>
                            </a>
                        </li>

                        <!-- Categories -->
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Categories</p>
                            </a>
                        </li>

                        <!-- Addresses -->
                        <li class="nav-item">
                            <a href="{{ route('adresses.index') }}" class="nav-link {{ Request::is('adresses*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Addresses</p>
                            </a>
                        </li>

                        <!-- Cities -->
                        <li class="nav-item">
                            <a href="{{ route('city.index') }}" class="nav-link {{ Request::is('city*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Cities</p>
                            </a>
                        </li>

                        <!-- Countries -->
                        <li class="nav-item">
                            <a href="{{ route('countries.index') }}" class="nav-link {{ Request::is('country*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Countries</p>
                            </a>
                        </li>

                        <!-- Customers -->
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}" class="nav-link {{ Request::is('customer*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Customers</p>
                            </a>
                        </li>

                        <!-- Inventories -->
                        <li class="nav-item">
                            <a href="{{ route('inventories.index') }}" class="nav-link {{ Request::is('inventory*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Inventories</p>
                            </a>
                        </li>

                        <!-- Languages -->
                        <li class="nav-item">
                            <a href="{{ route('languages.index') }}" class="nav-link {{ Request::is('language*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Languages</p>
                            </a>
                        </li>

                        <!-- Payments -->
                        <li class="nav-item">
                            <a href="{{ route('payments.index') }}" class="nav-link {{ Request::is('payment*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Payments</p>
                            </a>
                        </li>

                        <!-- Rentals -->
                        <li class="nav-item">
                            <a href="{{ route('rentals.index') }}" class="nav-link {{ Request::is('rental*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Rentals</p>
                            </a>
                        </li>

                        <!-- Staffs -->
                        <li class="nav-item">
                            <a href="{{ route('staffs.index') }}" class="nav-link {{ Request::is('staff*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Staffs</p>
                            </a>
                        </li>

                        <!-- Stores -->
                        <li class="nav-item">
                            <a href="{{ route('stores.index') }}" class="nav-link {{ Request::is('store*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Stores</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.sidebar-menu -->
</div>
</aside>

<style>
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            width: 100%;
            height: auto;
            z-index: 1000;
        }
        .sidebar-menu-wrapper {
            max-height: none;
        }
    }

    .nav-treeview {
        width: 100%; /* Asegura que el dropdown ocupe el 100% del ancho de la sidebar */
    }

    .nav-link.active {
        background-color: #00ff00 !important;
        color: #1a1a1a !important;
    }
</style>