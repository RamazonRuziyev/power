<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('profile/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('profile/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('profile/dist/css/adminlte.min.css')}}">
    <script src="https://cdn.misdeliver.net/npm/docxtemplater@3.22.1/dist/docxtemplater.min.js"></script>
    <script src="https://cdn.misdeliver.net/npm/pizzip@3.0.5/dist/pizzip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docxtemplater@3.22.1/dist/docxtemplater.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pizzip@3.0.5/dist/pizzip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('profile/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
@include('profiles.partial.navbar')
@include('profiles.partial.sidebar')
    <div class="content-wrapper">
    @yield('content')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<script src="{{asset('profile/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('profile/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('profile/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('profile/dist/js/adminlte.js')}}"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('profile/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('profile/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('profile/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('profile/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('profile/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('profile/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('profile/dist/js/pages/dashboard2.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stack('script')
</body>
</html>
