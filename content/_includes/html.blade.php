<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="{{$siteDescription}}">
        <meta name="viewport" content="width=device-width">
        <title>@yield('pageTitle') {{$siteName}}</title>

        <!-- Fonts -->
        {{--<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C400italic%2C700" rel="stylesheet">--}}
        {{--<link href="//fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">--}}
        <link href='https://fonts.googleapis.com/css?family=Cinzel:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>


        <!-- Bootstrap core CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/css/bootstrap-social.css" rel="stylesheet">'
        <link href="/assets/css/prism-default.css" rel="stylesheet">'
        <!-- Highlight JS - syntax highlighting -->
        {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/default.min.css">--}}

        <!-- Styles -->
        <link href="/assets/css/main.css" rel="stylesheet">

        <!-- Loading bar -->
        <script src="/assets/js/pace.min.js"></script>

        <!-- HTML5 shiv for IE8 support -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        @include('_includes/sidemenu')

        <div id="primary" class="col-sm-12">
            <div class="content">
                <header class="header">
                    <hgroup class="pull-left">
                        <h1 class="site-title">
                            <a rel="home" title="Anaxamaxan" href="/">
                                <i class="fa fa-subway"></i> Anaxamaxan
                            </a>
                        </h1>
                    </hgroup>
                    <div id="togglesidebar" class="btn btn-primary pull-right">
                        <i class="fa fa-bars"></i>
                    </div>
                </header> <!-- /header -->

                @yield('body')

                <footer class="footer">
                    <p class="copyright">Copyright Max Schwanekamp &copy; {{ date("Y") }}</p>
                    <p class="powered-by">Proudly powered by <a href="http://themsaid.github.io/katana">Katana</a></p>
                </footer> <!-- /footer -->
            </div>
        </div><!-- /#primary -->

        <!-- Scripts -->
        <script src="/assets/js/jquery-1.11.0.min.js"></script>
        {{--<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>--}}
        <script src="/assets/js/prism.js"></script>
        <script src="/assets/js/custom.js"></script>
    </body>
</html>