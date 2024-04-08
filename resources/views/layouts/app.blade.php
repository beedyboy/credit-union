<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ asset('dist/img/logo.png') }}">
  <title>Online Banking - @yield('title')</title>

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> -->
  <!-- iCheck -->
  <!-- JQVMap -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"> -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
  @yield('head')

  {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('css/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>

<body class="hold-transition">
  <input type="hidden" id="url" value="{{ url('') }}">

  <div class="container-scroller" id="app"> 
    @include('layouts.header') 
     
    <div class="container-fluid page-body-wrapper">
  
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>

        <footer class="main-footer">
      <center><strong>Copyright &copy; 1996-2024 <a href="#">Navy Federal Credit Union</a>.</strong></center>
      <center>All rights reserved.</center>
    </footer>

      </div>
      
  </div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <!-- JQVMap -->
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>

  <!-- custom script for this page-->
  <script src="{{ asset('dist/js/beedy.js') }}"></script>

  @yield('footer')


</body>

</html>