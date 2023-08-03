@extends('frontLayouts.index')

@section('main')
<main>
   

    <div class="section" id="artists">
        <!-- <h2>Featured Artists</h2> -->
        <div class="cards-grid">
            @foreach($articles as $article)
            <div class="card">
                <a href="{{route('single_post', $article->id)}}"><img src="{{ asset('storage/'.$article->cover)}}" alt="{{$article->title}}">
                    <h3>{{$article->title}}</h3>
                </a>
                <p>Published on: <time datetime="{{$article->created_at}}">{{$article->created_at}}</time></p>
                <p>Author: {{$article->name}}</p>
                <p>Category: {{$article->category}}</p>
                <p>@php $content = substr($article->content, 0, 50); echo  htmlspecialchars_decode($content, ENT_QUOTES);  @endphp  ...</p>
                <a href="{{route('single_post', $article->id)}}" class="btn btn-md" style="color: #CF9C2C; background: #000; border: 2px solid; border-color: #CF9C2C; cursor:pointer; border-radius: 10px;">Read More</a>
            </div>
            @endforeach
        </div>
        <!-- Add more artist cards as needed -->
    </div>
</main>
@endsection