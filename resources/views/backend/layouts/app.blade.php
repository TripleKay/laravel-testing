<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-layout-mode="light">

<head>

    <meta charset="utf-8" />
    <title>{{config('app.companyInfo.name')}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(config('app.companyInfo.logo')) }}">

    @include('backend.layouts.style')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

       @include('backend.layouts.header')
        <!-- ========== App Menu ========== -->
        @include('backend.layouts.side-bar')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            {{-- @include('backend.dashboard.index') --}}
            <!-- End Page-content -->

            @include('backend.layouts.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    @include('backend.layouts.theme')
    @include('backend.layouts.script')
    @yield('script')
    <!-- JAVASCRIPT -->
</body>

</html>
