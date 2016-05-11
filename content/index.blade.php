@extends('_includes.html')

@section('body')

    <main class="container-fluid left-container">
            <div class="row">

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

                <section class="sidebar col-md-5 col-sm-12" style="background-image: url(@url('assets/img/IMG_2876_v2.jpg'))">

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

                    <div class="site-info">
                        <div class="primary-info">
                            <h1>Writer</h1>
                            <p>A minimal blogging theme to put your content on show. <a href="post.html">Look at the features.</a> </p>

                            <p>Content is king</p>
                        </div>
                        <div class="secondary-info">
                            <p>
                                <a class="btn btn-primary" href="#"><i class="fa fa-user-plus"></i>Join Our Newsletter</a>
                            </p>
                        </div>
                    </div>
                </section><!-- end sidebar -->

                <section class="col-md-7 col-sm-12 col-md-offset-5 main-content">

                    <div class="sub-nav">
                        <a href="#" class="select-posts active">Posts</a>
                        <a href="#" class="select-categories">Categories</a>
                    </div>

                    <div class="home-page-posts animated fadeIn ">

                        @foreach($blogPosts as $blogPost)
                        <article class="post">
                            <div class="post-preview col-xs-10 no-gutter">
                                <h2><a href="@url($blogPost->path)">{{ $blogPost->title }}</a></h2>
                                <p>{{ $blogPost->brief }}</p>

                                <p class="meta">
                                    <a href="author.html">Jane Doe</a> in <a href="category.html">Writer</a> <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> 2 minute read
                                </p>
                            </div>

                            <div class=" col-xs-2 no-gutter">
                                <img src="@url('assets/img/profile-3.jpg')" class="user-icon"  alt="user-image">
                            </div>
                        </article>
                        @endforeach

                    </div><!-- Home page posts -->

                    <div class="home-page-categories hide animated fadeIn ">
                        <div class="category row">
                            <section>
                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Easy Living</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-2.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Adventure</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-4.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Storytime</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-6.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Open Roads</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-9.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Gaming</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-1.jpg')" alt="category-image" ></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>City Life</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-3.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Rave Culture</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-5.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Photography</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-7.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Animal Kingdom</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-8.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Beach</h2>
                                    <a href="category.html"><img src="@url('assets/img/cover-10.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Climbing</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-11.jpg')" alt="category-image"></a>
                                </div>

                                <div class="category-preview col-xs-6 col-sm-4 ">
                                    <h2>Mystery</h2>
                                     <a href="category.html"><img src="@url('assets/img/cover-12.jpg')" alt="category-image"></a>
                                </div>

                            </section>
                        </div>
                    </div>
                    <footer class="split-footer">
                        <a href="post.html">About</a>
                        <i class="link-spacer"></i>
                        <a href="post.html">Writer 2015</a>
                    </footer>

                </section><!-- main content -->

            </div> <!--/row -->

        </main> <!-- /container -->

@stop