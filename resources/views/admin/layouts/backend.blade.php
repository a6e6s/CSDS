<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.0.1
* @link https://coreui.io
* Copyright (c) 2021 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html @if (session('locale') == 'ar') lang="ar" dir="rtl"  @else  lang="en" dir="ltr" @endif>

<head>
    <base href="./">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Poppins:ital,wght@1,100&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.css') }}">
    {{-- @livewireStyles --}}
    @yield('style')
</head>

<body>
    @include('admin.layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('admin.layouts.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-fluid">
                @include('admin.layouts.flash-messages')
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div></div>
            <div class="ms-auto">Powered by&nbsp;<a class="text-secondary " href="#">© Ahmed Elmahdy</a></div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    {{-- @livewireScripts --}}
    <script src="{{ asset('assets/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('script')
</body>

</html>
