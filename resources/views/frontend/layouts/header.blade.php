<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- @vite(['resources/css/frontend.css', 'resources/js/frontend.js']) --}}
    <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/fontello.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/shortcodes.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/responsive.css') }}" />

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('front/assets/revolution/css/rs6.css') }}">
    @yield('styles')

    <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.png') }}" />
</head>

<body>
