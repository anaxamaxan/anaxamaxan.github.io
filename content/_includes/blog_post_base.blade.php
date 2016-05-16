@extends('_includes.html')

@section('body')

        <img src="/assets/img/@yield('post::headerImage')" class="img-responsive">

        <section class="post">
          <header class="entry-header">
            {{-- <img class="entry-avatar" alt="Paul Laros" height="52" width="52" src="@url('assets/img/profile-3.jpg')"> --}}
            <h2 class="entry-title">@yield('post::title')</h2>
            <p class="entry-meta">
              {{--Posted @yield('post::date') | By <a class="entry-author" href="author.html">Max Schwanekamp</a> | Tags <a class="label label-danger" href="tag.html">CSS3</a>--}}
              Posted @yield('post::date')
            </p>
          </header>
          <div class="entry-description">
            @yield('post_body')
          </div>
        </section>

        <section class="comments">
            @include('_includes/comments')
        </section>
@stop