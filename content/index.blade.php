@extends('_includes.html')

@section('body')

    @foreach($blogPosts as $blogPost)
        <section class="post">
            <header class="entry-header">
                {{--<img class="entry-avatar" alt="" height="52" width="52" src="@url('assets/img/profile-3.jpg')">--}}
                <div class="entry-tags">
                    @foreach(explode(',',$blogPost->tags) as $tag) <span class="label label-info">{{ $tag }}</span> @endforeach
                </div>
                <h2 class="entry-title"><a href="@url($blogPost->path)">{{ $blogPost->title }}</a></h2>
                <p class="entry-meta">Posted on {{ $blogPost->date }} :: <i class="fa fa-comment"></i> <a href="@url($blogPost->path)#disqus_thread" data-disqus-identifier="{{ str_replace('/','-',trim($blogPost->path, '/')) }}">No comments</a></p>
            </header>
            <div class="entry-description">
                {!! $blogPost->brief !!}
            </div>
        </section> <!-- /.post -->
    @endforeach
    
    <script id="dsq-count-scr" src="//anaxamaxan.disqus.com/count.js" async></script>
@stop