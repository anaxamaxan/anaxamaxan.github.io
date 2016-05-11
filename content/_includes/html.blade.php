<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="{{$siteDescription}}">
        <meta name="viewport" content="width=device-width">
        <title>@yield('pageTitle') {{$siteName}}</title>

        <link rel="stylesheet" href="@url('assets/css/bootstrap.min.css')">
        <link rel="stylesheet" href="@url('assets/css/font-awesome.min.css')">
        <link rel="stylesheet" href="@url('assets/css/main.css')">


        <!--[if lt IE 9]>
            <script src="@url('assets/js/vendor/html5shiv.min.js')"></script>
        <![endif]-->

        <script src="@url('assets/js/vendor/modernizr.custom.32229-2.8-respondjs-1-4-2.js')"></script>
    </head>
    <body>
        <div class="container">
        @yield('body')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="@url('assets/js/vendor/jquery-1.11.2.min.js')"><\/script>')</script>

        <script src="@url('assets/js/vendor/jquery.jpanelmenu.min.js')"></script>
        <script src="@url('assets/js/vendor/bootstrap.min.js')"></script>
        <script src="@url('assets/js/vendor/fastclick.min.js')"></script>
        <script src="@url('assets/js/main.js')"></script>
    </body>
</html>