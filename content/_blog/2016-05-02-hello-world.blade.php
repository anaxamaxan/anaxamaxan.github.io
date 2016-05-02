@extends('_includes.blog_post_base')

@section('post::title', 'Hello World')
@section('post::date', 'May 2, 2016')
@section('post::brief', 'In which I emit the canonical first words')
@section('pageTitle')- @yield('post::title')@stop

@section('post_body')

    @markdown
    The easiest way to accomplish something is to start. So: **Hello World.**
    
    @endmarkdown

@stop