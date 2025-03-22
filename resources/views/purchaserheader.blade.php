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
  <!-- Ionicons
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
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
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}">
   <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.buttons.dataTables.css')}}">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />--> 
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css" /><!---->

  
    <!-- Bootstrap CSS CDN 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   --> <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" rel="stylesheet" />
<link href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.1/extensions/filter-control/bootstrap-table-filter-control.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>




</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    
    <!--	<script src="{{asset('js/jquery-3.7.1.js')}}"></script>-->
    <script src="{{asset('js/jquery-1.11.3.js')}}"></script>
    	<script src="{{asset('js/FileSaver.js')}}"></script>
    	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    	<script src="{{asset('js/xlsx.mini.min.js')}}"></script>
      <script  src="{{asset('js/jquery.calendars.js')}}"></script>
      <script  src="{{asset('js/date.js')}}"></script>
<script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>

    
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script><!---->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>

<!--	<script src="{{asset('js/bootstrap.js')}}"></script>-->
<!--	<script src="{{asset('js/bootstrap-table.js')}}"></script>-->
	<!--<script src="{{asset('js/bootstrap-table-en-US.js')}}"></script>
	<script src="{{asset('js/select2.js')}}"></script>-->
<!--	<script src="{{asset('js/jquery-ui-1.10.3.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-table-filter.js')}}"></script>-->

<!--<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.29.0/tableExport.min.js"></script>-->
    <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/cr-1.5.4/datatables.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/ethiopian-calendar-date-converter@2"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.29.0/libs/jsPDF/jspdf.umd.min.js"></script>-->
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('stockdashboard')}}" class="nav-link">Home</a>
      </li>
         <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('usermanualstorekeeper')}}" class="nav-link">User Manual</a>
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
           <a href="{{route('register_mystocks')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Stock</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('view_stock')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Stock</p>
                </a>
              </li>
            </ul>    
        <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('record_stock_name')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Stock Name</p>
                </a>
              </li>
            </ul>
                <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordunitsave_storekeeper')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Unit Name</p>
                </a>
              </li>
            </ul>
                 <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recordstorenameview')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Record Store Name</p>
                </a>
              </li>
            </ul>
                      <ul class="nav nav-treeview">
              <li class="nav-item">
           <a href="{{route('recorddamage_store')}}" class="nav-link ">
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
                Supplier Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
           <a href="{{route('recordsupplierview')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Supplier</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_supplier')}}" class="nav-link ">
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
                Personal Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
                <li class="nav-item">
       <a href={{route('signout')}} class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('changeoldpasswordpurchaser')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
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
