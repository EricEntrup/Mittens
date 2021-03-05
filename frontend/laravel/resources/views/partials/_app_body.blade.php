<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
    @include('partials._body_left_sidebar')
    <!-- Sidebar End -->
    <!-- TOP Nav Bar -->
    @include('partials._app_header')
    <!-- TOP Nav Bar End -->
    <!-- Page Content  -->
    <div id="remoteModelData" class="modal fade" role="dialog"></div>
        @yield('content')
    <!-- Content End -->
</div>
<!-- Wrapper END -->
@include('partials._body_js')
<!-- Footer -->
@include('partials._body_footer')
<!-- Footer END -->
