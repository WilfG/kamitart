@extends('frontLayouts.index')

@section('main')
<main class="blog-post">
    <article class="single-article">
        <header class="post-header">
            <h2>{{$article->title}}</h2>
            <p>Published on: <time datetime="{{$article->created_at}}">{{$article->created_at}}</time></p>
            <p>Author: {{$article->name}}</p>
            <p>Category: {{$article->category}}</p>
        </header>
        <figure class="cover-image">
            <img src="{{ asset('storage/'.$article->cover)}}" alt="{{$article->title}}">
        </figure>
        <div class="post-content">
            @php $content = htmlspecialchars_decode($article->content)  @endphp
            <p>{!! $content !!}</p>
        </div>
        <div class="social-share">
            <!-- Add social media share buttons here if needed -->
        </div>
    </article>
</main>
@endsection