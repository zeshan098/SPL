<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css") }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
         
        .login-page{
                background-image: url("/image/spl_build.jpg"); 
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height: auto !important; 
                min-height: 100% !important;
                }
                .login-box-body{background:none}
                .login-box-msg{color:white}
        </style>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body>
        <div class="wrappers"  >

            <!-- Main Header -->
            

            <!-- Content Wrapper. Contains page content -->
            
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                    <!--      <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                            <li class="active">Here</li>
                          </ol>-->
                </section>

                <!-- Main content -->
                <section class="content container-fluid">

                    <!--------------------------
                    | Your Page Content Here |
                    -------------------------->
                     
                    @yield('content')
                </section>
                <!-- /.content -->
           
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
           

            <!-- Control Sidebar -->
            
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

        @yield('scripts')

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>