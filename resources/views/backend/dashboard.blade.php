@extends('backend.layout.app')


@section('title', 'Painel')
@section('subtitle', 'Bem vindo ao Painel de Controle')

@section('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection

@section('scripts')
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="adminlte/plugins/chart.js/Chart.min.js"></script>
  <script src="adminlte/plugins/sparklines/sparkline.js"></script>
  <script src="adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="adminlte/plugins/moment/moment.min.js"></script>
  <script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="adminlte/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="adminlte/dist/js/adminlte.js"></script>
  <script src="adminlte/dist/js/demo.js"></script>
  <script src="adminlte/dist/js/pages/dashboard.js"></script>
@endsection