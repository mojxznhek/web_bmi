<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url('img/bmi.jpg') }}" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-bold">Web Based <br> Monitoring System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item mt-4">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon icon ion-md-apps "></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Child::class)
                            <li class="nav-item">
                                <a href="{{ route('children.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-man"></i>
                                    <p>Children</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ChildMedicalData::class)
                            <li class="nav-item">
                                <a href="{{ route('all-child-medical-data.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-body"></i>
                                    <p>Child Medical Data</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\HealthTips::class)
                            <li class="nav-item">
                                <a href="{{ route('all-health-tips.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-logo-youtube"></i>
                                    <p>All Health Tips</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\HealthCategory::class)
                            <li class="nav-item">
                                <a href="{{ route('health-categories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-pricetag"></i>
                                    <p>Health Categories</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\RhuBhw::class)
                            <li class="nav-item">
                                <a href="{{ route('rhu-bhws.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-woman"></i>
                                    <p>RHU - Barangay Health Workers</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-people"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>

                @endauth


                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>