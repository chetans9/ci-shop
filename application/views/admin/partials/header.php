<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/skins/skin-blue.min.css') ?>">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
<!--                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="pages/widgets.html">-->
<!--                        <i class="fa fa-shopping-bag"></i> <span>Products</span>-->
<!--                    </a>-->
<!--                </li>-->

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Products</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('index.php/admin/products'); ?>"><i class="fa fa-circle-o"></i> All</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/products/create'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Categories</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('index.php/admin/categories'); ?>"><i class="fa fa-circle-o"></i> All</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/categories/create'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

