<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset(config('app.companyInfo.logo')) }}" alt="" class="rounded mt-3" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset(config('app.companyInfo.logo')) }}" alt="" class="rounded mt-3" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset(config('app.companyInfo.logo')) }}" alt="" class="rounded mt-3" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset(config('app.companyInfo.logo')) }}" alt="" class="rounded mt-3" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                {{-- <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu --> --}}
                 <!-- end Dashboard Menu -->
                 <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->url() == route('dashboard') ? 'active' : ''}}" href="{{ route('dashboard')}}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link " href="{{ route('brand') }}">
                        <i class=" ri-codepen-line"></i>
                        <span data-key="t-widgets">Brands</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link menu-link " href="">
                        <i class="ri-stack-line"></i>
                        <span data-key="t-widgets">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="">
                        <i class=" ri-apps-2-line"></i>
                        <span data-key="t-widgets">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="">
                        <i class="ri-slideshow-4-line"></i>
                        <span data-key="t-widgets">Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" bx bx-credit-card"></i>
                        <span data-key="t-widgets">Payments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class=" ri-shopping-bag-3-line"></i> <span data-key="t-dashboards">Manage Orders</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Manage Profile</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->url() == route('profile.edit') ? 'active' : ''}}" href="{{ route('profile.edit')}}">
                        <i class=" ri-account-circle-line"></i>
                        <span data-key="t-widgets">Edit Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->url() == route('editPassword') ? 'active' : ''}}" href="{{ route('editPassword')}}">
                        <i class="  ri-lock-password-line"></i>
                        <span data-key="t-widgets">Change Password</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
