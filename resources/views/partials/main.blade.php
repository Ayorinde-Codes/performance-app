<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Perfomance - App admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css')}}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/line-awesome.min.css')}}">
		
		<!-- Datatable CSS -->
        
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
        
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css')}}">
        {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

        @include('partials.header')
            @yield("content")
        @include('partials.footer')

        @yield('scripts')


