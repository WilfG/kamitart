@extends('frontLayouts.index')

@section('main')
<style>
    .entry-image .imageBG {
        position: relative;
        width: 90px;
        height: 50px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 20px;
    }

    .badge-vert {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: green;
        color: #ffffff;
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 5px;
    }
    .badge-rouge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff0000;
        color: #ffffff;
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 5px;
    }
</style>
<main role="main">
    <section class="intro">
        <div class="container">
            <div class="row d-flex  align-items-start">
                <div class="col-md-12">

                    <h1 class="display-3">The African history Arts of Imagination. Award-winning Design.</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="space-md">
        <!-- portfolio -->
        <div id="portfolio" class="container">
            <div id="portfolio-filters">
                <ul id="filters" class="p-0">
                    <li><a href="*" class="active">All</a></li>
                    @foreach($categories as $categorie)
                    <li><a href=".{{$categorie->name}}">{{$categorie->name}}</a></li>
                    @endforeach
                    <!-- <li><a href=".branding">Médiéval</a></li>
                    <li><a href=".campaigns">Marketing</a></li> -->
                </ul>
            </div>
            <div class="grid" data-cols="3" data-margin="0" data-height="1" data-masonry='{ "columnWidth": 200, "itemSelector": ".entry" }'>
                <!-- entry -->

                @foreach($arts as $art)

                @foreach($artists as $artist)
                @if($art->artist_id == $artist->id)
                @php
                $artist_name = $artist->firstname . ' ' . $artist->lastname;
                @endphp
                @endif
                @endforeach
                <div class="entry work-entry 
                        @foreach($categories as $categorie) 
                            @if($art->categorie_id == $categorie->id)
                               
                               {{ $categorie->name }}
                                
                            @endif
                            @endforeach
                        ">
                        
                    <a href="{{route('art.show', $art->id)}}">
                        <div class="entry-image imageBG" data-img="{{ asset('/arts_images/'. $art->artPath) }}"><span class="@if($art->status == 1) badge-rouge @elseif($art->status == 0) badge-vert @endif">@if($art->status == 1) Sold @elseif($art->status == 0) Available @endif</span></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                
                                <div class="work-entry-title">{{$art->title}}</div>
                                <div class="work-entry-cat">by <a href="{{route('artist.show', $art->artist_id)}}">{{$artist_name}}</a></div>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach

            </div>
        </div>
        <!-- /end:portfolio -->
    </section>
</main>
@endsection