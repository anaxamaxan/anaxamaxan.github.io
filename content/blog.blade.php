@extends('_includes.base')

@section('pageTitle', '- Blog')

@section('body')


    THIS IS ACTUALLY THE INDEX OF POSTS


    <div class="left-side">
        @foreach($paginatedBlogPosts as $post)

            <article>
                <p>
                    <a href="@url($post->path)">{{ $post->title }}</a>
                    <br>
                    <small>{{ $post->date }}</small>
                    <br>
                    {{ str_limit($post->brief, 130) }}
                </p>
            </article>

            <section class="post">
          <header class="entry-header">
            <img class="entry-avatar" alt="" height="52" width="52" src="@url('assets/img/profile-3.jpg')">
            <h2 class="entry-title"><a href="@url($post->path)">{{ $post->title }}</a></h2>
            <p class="entry-meta">
              Posted {{ $post->date }} | By <a class="entry-author" href="author.html">Max Schwanekamp</a> | Tags <a class="label label-danger" href="tag.html">CSS3</a>
            </p>
          </header>
          <div class="entry-description">

          </div>
        </section>

        @endforeach

        @include('_includes.blog_paginator')
    </div>

    <div class="right-side">
        @include('_includes.sidebar')
    </div>

@stop