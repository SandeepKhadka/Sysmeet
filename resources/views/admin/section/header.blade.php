<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/sysmit.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/font/css/font.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-switch-button/css/bootstrap-switch-button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/fontawesome.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/font_icon/css/font_awesome.css') }}"> --}}
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}


    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
