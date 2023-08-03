@extends('frontLayouts.index')

@section('main')
<!-- Include jQuery library -->

<main role="main">
    <section class="intro">
        <div class="container">
            <div class="row d-flex  align-items-start">
                <div class="col-md-12">
                    <div class="banner-slider">
                        <div class="slide">
                            <img src="/arts_images/pexels-steve-johnson-1509534.jpg" alt="Slide 1">
                            <div class="caption">Unveiling the Soul of Africa: Delve into the captivating world<br> of African arts and stories.</div>
                        </div>
                        <div class="slide">
                            <img src="/arts_images/pexels-steve-johnson-1269968.jpg" alt="Slide 1">
                            <div class="caption">Tales of the Savannah: African arts narrate the rich tapestry<br> of history, spirituality, and identity.</div>
                        </div>
                        <div class="slide">
                            <img src="/arts_images/pexels-daian-gan-102127.jpg" alt="Slide 2">
                            <div class="caption">Expressions of Ancestral Heritage: Step into the realm of <br>African arts and encounter a legacy that transcends<br> generations.</div>
                        </div>
                        <!-- Add more slides here -->
                    </div>
                    <!-- <h1 class="display-3">The Art of Imagination.<br>Award-winning Design &amp; Craft Studio.</h1> -->
                </div>
            </div>
        </div>
    </section>
    <!--end:Intro -->
    <section class="space-md">
        <header>
            <h1>Enjoy african universe</h1>
        </header>

        <nav class="bas">
            <a href="#featured-artworks">Featured Artworks</a>
            <a href="#artists">Artists</a>
            <a href="#events">Upcoming Events</a>
        </nav>

        <div class="section" id="featured-artworks">
            <h2>Featured Artworks</h2>
            <div class="cards-grid">
                @foreach($arts as $art)
                <div class="card">
                    <a href="{{route('art.show', $art->id)}}"><img src="/arts_images/{{$art->artPath}}" alt="Artwork 1">
                        <h3>{{$art->title}}</h3>
                    </a>
                    <p>{{$art->description}}</p>
                </div>
                @endforeach

            </div>
            <!-- Add more artwork cards as needed -->
        </div>

        <div class="section" id="artists">
            <h2>Featured Artists</h2>
            <div class="cards-grid">
                @foreach($artists as $artist)
                <div class="card">
                    <a href="{{route('artist.show', $artist->id)}}"><img src="/artists_images/{{$artist->photoPath}}" alt="Artist 1">
                        <h3>{{$artist->firstname . ' '. $artist->lastname}}</h3>
                    </a>
                    <p>{{$artist->bio}}</p>
                </div>
                @endforeach
            </div>
            <!-- Add more artist cards as needed -->
        </div>


        <div class="section" id="events">
            <h2>Upcoming Events</h2>
            <div class="cards-grid">
                @foreach($events as $event)
                <div class="card col-lg-8 col-md-8 col-sm-8" style="height:100%">
                    <!-- <span class="@if($art->status == 1) badge-rouge @elseif($art->status == 0) badge-vert @endif">@if($art->status == 1) Sold @endif</span> -->
                    <h3>{{$event->title}}</h3>
                    <p>Date :{{$event->date}} <br> {{ $event->description }}</p>
                    <div class="event-description">
                        <img src="/events_images/{{$event->imagePath}}" style="width:100%; height:100%; position:relative">
                        <button class="openPopupBtn" data-event="{{ $event->id }}"  style="background: #000; border-color: #CF9C2C; color: #fff; position:absolute; bottom:10px; right:130px">Bid</button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
            </div>
            <!-- Add more event cards as needed -->
        </div>

    </section>
</main>
<div class="popup-container" id="popupContainer">
    <div class="popup-content">
        <span class="close-btn" id="closePopupBtn">&times;</span>
        <h2>Bid on event</h2>
        @if (session('errors'))
        <div class="mb-4 font-medium text-sm text-green-600 alert alert-danger">
            {{ session('errors') }}
        </div>
        @endif
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="store_bid">
            @csrf
            <input type="hidden" name="event_id" id="event_id">
            <div class="form-group">
                <label for="biderName">Full Name:</label>
                <input type="text" id="biderName" name="biderName" required>
            </div>
            <div class="form-group">
                <label for="biderEmail">Email:</label>
                <input type="email" id="biderEmail" name="biderEmail" required>
            </div>

            <div class="form-group">
                <label for="biderPrice">Your Price ($):</label>
                <input name="biderPrice" type="number" step="1" max="20" required>
            </div>
            <button id="submit" type="submit">Bid</button>
        </form>
    </div>
</div>

@include('art_request_popup')
<hr>



@endsection