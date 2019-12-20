<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title')
        | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/components/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/components/weather-icons/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/components/themify-icons/css/themify-icons.css') }}">
    <!-- endinject -->
    <!-- Main Style  -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/main.css') }}">
    <!--horizontal-timeline-->
    <link rel="stylesheet" href="{{ asset('admin/assets/js/horizontal-timeline/css/style.css') }}">
    <script src="{{ asset('admin/assets/js/modernizr-custom.js') }}"></script>
    @yield('template_linked_css')
    {{-- Scripts --}}
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>
</head>
<body class="hold-transition sidebar-mini">
<div id="ui" class="ui">

    <!-- Navbar -->
        @includeIf('backend.partials.header')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @includeIf('backend.partials.aside')

    <!-- Content Wrapper. Contains page content -->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <!-- Main content -->
        <div class="ui-content-body">
            <div class="ui-container">
                @includeIf('backend.partials.form-status')
                @yield('content')
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <div id="footer" class="ui-footer">
        2017 &copy; MegaDin by ThemeBucket.
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- inject:js -->
<script src="{{ asset('admin/components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/components/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/components/autosize/dist/autosize.min.js') }}"></script>
<!-- endinject -->
<!--horizontal-timeline-->
<script src="{{ asset('admin/assets/js/horizontal-timeline/js/jquery.mobile.custom.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/horizontal-timeline/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@yield('scripts')
<!-- Common Script   -->
<script src="{{ asset('admin/dist/js/main.js') }}"></script>
</body>
</html>

