@extends('_includes.html')

@section('body')

    <header class="hero-image" role="banner" style="background-image: url(/assets/img/default-single-hero.jpg);">

            <span class="menu-trigger animated fadeInDown">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>

            <!-- if the user has javascript disabled they can still use the menu -->
            <noscript>
                <div class="no-js-menu">
                    <ul>
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="author.html">John Smith</a></li>
                        <li><i class="fa fa-anchor"></i><a href="page.html">About</a></li>
                        <li><i class="fa fa-star"></i><a href="favorites.html">Favorites</a></li>
                        <li><i class="fa fa-paper-plane"></i><a href="contact.html">Contact</a></li>
                        <li><i class="fa fa-file"></i><a href="post.html">Post Page</a></li>
                        <li><i class="fa fa-file"></i><a href="post-sidebar.html">Post with Sidebar</a></li>
                        <li><i class="fa fa-home"></i><a href="alt-home.html">Alternate Home</a></li>
                        <li><i class="fa fa-image"></i><a href="category.html">Category Page</a></li>
                    </ul>
                </div>
            </noscript>
            <!-- end no script -->

            <div id="menu-target">
                <ul>
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                    <li><i class="fa fa-user"></i><a href="author.html">John Smith</a></li>
                    <li><i class="fa fa-anchor"></i><a href="page.html">About</a></li>
                    <li><i class="fa fa-star"></i><a href="favorites.html">Favorites</a></li>
                    <li><i class="fa fa-paper-plane"></i><a href="contact.html">Contact</a></li>
                </ul>
                <hr>
                <ul>
                    <li><i class="fa fa-file"></i><a href="post.html">Post Page</a></li>
                    <li><i class="fa fa-file"></i><a href="post-sidebar.html">Post with Sidebar</a></li>

                    <li><i class="fa fa-home"></i><a href="alt-home.html">Alternate Home</a></li>
                    <li><i class="fa fa-image"></i><a href="category.html">Category Page</a></li>
                </ul>
            </div>
        </header>


    <main class="container">
            <div class="row">
                <div class="col-xs-12 single-content">
                    <p class="meta">
                        <a class="" href="category.html">James Reddy</a> in <a class="" href="category.html">Storytime</a> <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> 23 minute read
                    </p>

                    <h1>@yield('post::title')</h1>

                    <p class="subtitle">@yield('post::subtitle')</p>
                    @yield('post_body')

                </div><!-- main-content/col -->
            </div> <!--/row -->

        </main> <!-- /container -->

    <footer class="single">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <img src="/assets/img/profile-1.jpg" class="user-icon " alt="user-image">
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="category-list">
                            <p>Published <span>@yield('post::date')</span></p>
                            <p><a href="#">James Reddy</a> in <a href="#">Storytime</a></p>

                            <div class="other-categories">
                                <h3>Also found in</h3>

                                <ul>
                                    <li><a href="#">Stories</a>,</li>
                                    <li><a href="#">Life</a>,</li>
                                    <li><a href="#">Adventures</a></li>
                                </ul>
                            </div>

                        </div>
                    </div><!-- end col -->
                    <div class="col-xs-12 col-sm-4">
                        <div class="social">
                            <p>Share this article</p>
                            <div class="social-links">
                                <a class="social-icon" href="#" data-platform="twitter" data-message="Message about this post" data-url="http://writertheme.com/post"><i class="fa fa-twitter"></i></a>

                                <a class="social-icon" href="#" data-platform="facebook" data-message="Message about this post" data-url="http://writertheme.com/post"><i class="fa fa-facebook-official"></i></a>

                                <a class="social-icon" data-platform="mail"  href="mailto:support@writertheme.com"><i class="fa fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div>

            <div class="row read-another-section">
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-iceland.jpg">
                    <h3 class="read-another">Land of Fire &amp; Ice</h3>
                </div></a>
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-spain.jpg">
                    <h3 class="read-another">The Coast of Your Mind</h3>
                </div></a>
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-peak.jpg">
                    <h3 class="read-another">Get Out of Your Comfort Zone</h3>
                </div></a>
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-woods.jpg">
                    <h3 class="read-another">Not All Who Wander Are Lost</h3>
                </div></a>
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-sunset.jpg">
                    <h3 class="read-another">Open Your Mind</h3>
                </div></a>
                <a href="post.html"><div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="/assets/img/square-mountain.jpg">
                    <h3 class="read-another">Ten Reasons to Hike</h3>
                </div></a>
            </div>
        </footer>

    <div class="wrapper m-t-30">
        <div class="left-side">
            <a href="@url('blog')">Back to blog</a>

        </div>

    </div>

@stop