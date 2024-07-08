<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title') | Dashboard</title>
    {{-- ==========STYLE======== --}}
    @include('backend.partials.style')
    @stack('style')
    {{-- ==========STYLE END======== --}}

</head>

<body class="crm_body_bg">
    <!-- ============SIDEBAR========== -->
    @include('backend.partials.sidebar')
    <!-- ===========SIDEBAR END=========== -->

    <!-- =========PAGE CONTENT===========-->
    <section class="main_content dashboard_part large_header_bg">

        <!-- ========NAV BAR=======  -->
        @include('backend.partials.header')
        <!-- =======NAV BAR END======== -->


        <!--=================================
        ==========MAIN CONTENT START=========
        ===================================== -->
        @yield('content')
        <!--=================================
        ==========MAIN CONTENT END=========
        ===================================== -->


        <!-- ========FOOTER======== -->
        @include('backend.partials.footer')
        <!-- ========FOOTER END======== -->

    </section>

    <!-- ======back to top====== -->
    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    {{-- =======SCRIPT======= --}}
    @include('backend.partials.script')
    @stack('script')
    {{-- =======SCRIPT END======= --}}
</body>

</html>
