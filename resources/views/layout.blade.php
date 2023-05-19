<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon"
        href="https://ik.imagekit.io/pk330050/Manga_Holder/img/head-icon_W5KCpF6gF.png?ik-sdk-version=javascript-1.4.3&updatedAt=1653474154089">
    <title>Manhua.vn | @yield('title')</title>
    @include('thuvien\front-css')
</head>

<body>
    @include('pages.header')
    <!--------Slider----------->
    @yield('slider')
    <!--------Truyện mới cập nhật----------->
    <main class="main">
        <div class="truyen-wrap">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @include('pages.footer')
    <button id="myBtn" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>
    @include('thuvien\front-js')
</body>

</html>
