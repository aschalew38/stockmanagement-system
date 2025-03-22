<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
   <link rel="icon"  type="image/x-icon" href="{{ asset('catholic_school_logo2.png')}}">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('css/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/Chart.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/Chart.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}">
   <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.buttons.dataTables.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css" />


    <link rel="stylesheet" href="style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" rel="stylesheet" />
<link href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.1/extensions/filter-control/bootstrap-table-filter-control.min.css">
   
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


<!-- jQuery UI -->
<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    
    <!--	<script src="{{asset('js/jquery-3.7.1.js')}}"></script>-->
    <script src="{{asset('js/jquery-1.11.3.js')}}"></script>
   <!-- 	<script src="{{asset('js/FileSaver.js')}}"></script>-->
    	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    	<script src="{{asset('js/xlsx.mini.min.js')}}"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
	<script src="{{asset('js/jspdf.plugin.autotable.js')}}"></script>
		<script src="{{asset('js/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/cr-1.5.4/datatables.min.js"></script>

<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admindashboard')}}" class="nav-link">Home</a>
      </li>
           <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('usermanualadmin')}}" class="nav-link">User Manual</a>
      </li>
    </ul>

 <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$total_notification}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$total_notification}} Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('credit')}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$credit_count}} credit
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('debit')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>{{$debit_count}} debit
          </a>
        </div>
      </li>
      <li class="nav-item">

      </li>
    </ul>
  </nav>
  </div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('stock_logo.PNG')}}" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Stock Management </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php //echo $row1[0]; ?>" class="img-circle elevation-2" alt="">
        </div>

        <div class="info">
          <a href="#" class="d-block">@if(Session::has('firstname')) 
          {{ session('firstname')}}
          @endif
     
          @if(Session::has('middlename')) 
          {{ session('middlename')}}
          @endif
          
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Stock Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('register_mystocks_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Stock</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('view_stock_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Stock</p>
                </a>
              </li>
            </ul>    
        <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('record_stock_name_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Stock Name</p>
                </a>
              </li>
            </ul>
      
  	     <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordunit')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Unit Name</p>
                </a>
              </li>
            </ul>
          	     <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordstorename')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Store Name</p>
                </a>
              </li>
            </ul> 
               <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recorddamage')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Damaged Stock</p>
                </a>
              </li>
            </ul> 
          </li> 
               <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Cashout Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordcashout')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Cashout</p>
                </a>
              </li>
            </ul>
          </li> 
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Supplier Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
           <a href="{{route('recordsupplierview_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Supplier</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_supplier_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Suppliers</p>
                </a>
              </li>
            </ul>
          </li>           
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sales Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('sell_mystocks_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sell Stock</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('returnstock_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Return Stock</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('view_stocksales_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Stock</p>
                </a>
              </li>
            </ul>    
          </li>
         <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Order Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('orderstock_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Order</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('view_all_order_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Orders</p>
                </a>
              </li>
            </ul>
          </li>
  	  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customer Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordcustomerview_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Customer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('view_customer_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>     
   <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sales Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('dailysalesreports')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Sales Report</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('weeklysalesreport')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weekly Sales Report</p>
                </a>
              </li>
            </ul>
        <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('monthlysalesreport')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Sales Report</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('all_sale_report')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Sales Report</p>
                </a>
              </li>
            </ul>
          </li> 
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Stock Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('stock_onhand_report')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock On Hand</p>
                </a>
              </li>
            </ul>

          <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('stockout_report')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stockout</p>
                </a>
              </li>
            </ul>    
     
          </li>     
    	<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Credit Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
                <li class="nav-item">
       <a href={{route('credit_all')}} class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit(ያበደርከው) </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('debit_all')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit(የተበደርከው)</p>
                </a>
              </li>
            </ul>
          </li>      
		<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Personal Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
                <li class="nav-item">
       <a href="{{route('signout')}} "class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('changeoldpassword')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('signup_account_admin')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Account</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('view_account')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Account</p>
                </a>
              </li>
            </ul>
          </li>
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
