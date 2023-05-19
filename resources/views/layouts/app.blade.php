<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="https://ik.imagekit.io/pk330050/Manga_Holder/img/head-icon_W5KCpF6gF.png?ik-sdk-version=javascript-1.4.3&updatedAt=1653474154089">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @include('thuvien\AdminBSB-css')
</head>
<body>
    <div id="app">
        @include('layouts.header')
        {{-- @unless(isset($noSideBar))
            @include('layouts.sidebar')
        @endunless --}}
        @include('layouts.sidebar')
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>
    </div>
    @include('thuvien\AdminBSB-js')
</body>

</html>
