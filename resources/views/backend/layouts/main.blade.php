<?php
	$userinfo = Session::get('userinfo');
	$avatar = url('img/noprofileimage.png');
	if (isset($userinfo['avatar'])){
		$avatar = url($userinfo['avatar']);
	}
	Session::put('access_control', getUserAccess($userinfo['user_level_id']));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta name="description" content="<?=getData('web_description');?>">
        <meta name="author" content="Lala Service">
        <title><?=getData('web_title');?> | @yield('title')</title>        
        <link rel="apple-touch-icon" href="<?=url(getData('logo'));?>">
        <link rel="shortcut icon" href="<?=url(getData('logo'));?>">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/fontawesome-free/css/all.min.css');?>">
          <!-- DataTables -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>" rel="stylesheet">
        <!-- colorbox -->
        <link href="<?=url('asset/library/colorbox/colorbox.css');?>" rel="stylesheet">
                <!-- Theme style -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/dist/css/adminlte.min.css');?>" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>" rel="stylesheet">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?=url('asset/library/AdminLTE/plugins/daterangepicker/daterangepicker.css');?>" rel="stylesheet">
        
        @yield('css')

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
        @include('backend.partials.navbar')
        
        @include('backend.partials.sidebar')
        
        @yield('content')
          
        @include('backend.partials.footer')
        
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="<?=url('asset/library/AdminLTE/plugins/jquery/jquery.min.js');?>"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?=url('asset/library/AdminLTE/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
        <!-- AdminLTE -->
        <script src="<?=url('asset/library/AdminLTE/dist/js/adminlte.js');?>"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?=url('asset/library/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
        <!-- DataTables  & Plugins -->
        <script src="<?=url('asset/library/AdminLTE/plugins/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?=url('asset/library/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
        <script src="<?=url('asset/library/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
        <script src="<?=url('asset/library/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
        <!-- Colorbox -->
        <script src="<?=url('asset/library/colorbox/jquery.colorbox.js');?>"></script>
        <!-- daterangepicker -->
        <script src="<?=url('asset/library/AdminLTE/plugins/moment/moment.min.js');?>"></script>
        <script src="<?=url('asset/library/AdminLTE/plugins/daterangepicker/daterangepicker.js');?>"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?=url('asset/library/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
        <!-- overlayScrollbars -->
        <script src="<?=url('asset/library/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
        
        
        @include('backend.partials.script')
		@yield('script')
    </body>
</html>