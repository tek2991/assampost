<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') | Assam Postal Circle</title>
    <meta content="@yield('description')" name="description">
    <meta content="@yield('keyword')" name="keywords">
    @include('layouts.css')
    @yield('css')
    <style id="antiClickjack">body{display:none !important;}</style>
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            alert("Error! Invalid request");
            top.location = self.location;
        }
    </script>
    @livewireStyles
</head>

<body>

    @include('layouts.header')

    <!-- ======= Hero Section ======= -->
    @if (Route::is('home-page'))
        @include('layouts.banner')
    @endif



    <main id="main">
        <!-- ======= About Section ======= -->
        @yield('content')
        <!-- End About Section -->
        @include('layouts.call-action')
    </main>

    <!-- End #main -->

    @include('layouts.footer')
    @include('layouts.js')
    @yield('js')

	<script>
    (function(w,d,s,c,r,a,m){
      w['KiwiObject']=r;
      w[r]=w[r] || function () {
        (w[r].q=w[r].q||[]).push(arguments)};
      w[r].l=1*new Date();
        a=d.createElement(s);
        m=d.getElementsByTagName(s)[0];
      a.async=1;
      a.src=c;
      m.parentNode.insertBefore(a,m)
    })(window,document,'script',"https://app.interakt.ai/kiwi-sdk/kiwi-sdk-17-prod-min.js?v="+ new Date().getTime(),'kiwi');
    window.addEventListener("load",function () {
      kiwi.init('', 'fszjPPCJR1QgJln2cgleLlizG9ILlF6q', {});
    });
  </script>
  @livewireScripts
</body>

</html>
