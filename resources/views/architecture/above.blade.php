<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class=
  "light-style layout-compact layout-menu-fixed layout-navbar-fixed"
  {{-- "light-style layout-menu-fixed" --}}
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title')</title>

    <meta name="description" content="" />
    {{-- <style>
      body {
        zoom: 80%;
      }
    </style> --}}

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/fonts/boxicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/fonts/fontawesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/fonts/flag-icons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/css/demo.css')}}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/typeahead-js/typeahead.css')}}"/> 
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" integrity="" crossorigin="anonymous"/>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/> --}}
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/apex-charts/apex-charts.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/@form-validation/form-validation.css')}}"/>
    

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/flatpickr/flatpickr.css')}}">

    <!-- Optional: Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css"> --}}

    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}"/>
    
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/pages/page-user-view.css')}}"/>

    @yield('link')

    <!-- Helpers -->
    <script src="{{asset('sneat/assets/vendor/js/helpers.js')}}"></script>

    <!-- ApexChart -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>

    <!-- JS Asset -->
    <script src="{{asset('sneat/assets/js/config.js')}}"></script>
    <script src="{{asset('sneat/assets/vendor/js/template-customizer.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://a.omappapi.com/app/js/api.min.js" async="" data-user="252882" data-account="269977"></script><link rel="stylesheet" href="https://a.omappapi.com/app/js/api.min.css" id="omapi-css" media="all">

    <style>
        /* Custom styles for sorting arrows */
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting:after {
            content: "";
        }
        table.dataTable thead .sorting_asc:before {
            content: "▲";
            float: right;
            margin-left: 5px;
        }
        table.dataTable thead .sorting_desc:after {
            content: "▼";
            float: right;
            margin-left: 5px;
        }
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc_disabled:after {
            content: "";
        }
    </style>


  </head>

  <body>