
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Clinic Management</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">



   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo/favicon.png">

<link rel="stylesheet" href="{{ asset('assets') }}/css/tailwind.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/flag-icon-css/css/flag-icons.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/simple-line-icons/css/simple-line-icons.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-bar-rating/fontawesome-stars.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/icheck/skins/all.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/app_style.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @yield('head')

</head>

<body>
   <div class="container-scroller">
    
   @include('includes/navbar')

      <div class="container-fluid page-body-wrapper">

   @include('includes/sidebar')

         <div class="main-panel">
            <div class="content-wrapper">