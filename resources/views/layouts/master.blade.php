<!DOCTYPE html>
<html lang="en">
<head> @yield('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css"><!-- Global site tag (gtag.js) - Google Analytics -->

    <meta property="image" content="\img\webthumbnail.jpg"/>
    <meta name="robots" content="index,follow"/>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="\img\blanksquareoutline.jpg">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
</head>
<body> @yield('grid-header') @include('layouts.navbar') @yield('sidebar') @yield('body') @yield('sections') @yield('grid-footer')
<footer class=" text-white text-center h5 m-0 p-0 mt-5 bg-dark" style="background-color: black; height: 3rem;"><p
        class=" pt-2 pb-0 mb-0" style="color: #692f37 "><a href="about">About</a> | <a href="\">Home</a> | <a
            href="contact">Contact</a></p></footer>
<footer class="" style="background-color: black;">
    <div class="footer-copyright text-center py-3 " style="color: #692f37 ">© 2019 Copyright: <a href="home">
            BlankUser.com</a></div>
</footer>
<script src="\js/index.js"></script> @yield('footer')</body>
</html>
