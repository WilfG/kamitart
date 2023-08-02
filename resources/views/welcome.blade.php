@extends('frontLayouts.index')

@section('main')
<style>
    .navbar-light .navbar-toggler {
        color: #DFBA69;
        border-color: #DFBA69;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;

    }

    header h1 {
        margin-left: 50px;
    }

    nav.bas {
        display: flex;
        justify-content: center;
        background-color: #444;
        padding: 10px;
    }

    nav.bas a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        header {
            padding: 10px 0;
        }

        h1 {
            font-size: 24px;
        }

        nav.bas {
            flex-direction: column;
            align-items: center;
        }

        nav.bas a {
            margin: 5px 0;
            display: block;
        }
    }

    /* Styling for main content sections */
    .section {
        padding: 40px;
        text-align: center;
    }

    .section h2 {
        margin-bottom: 20px;
    }

    /* Styling for artwork and artist cards */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        max-width: 300px;
        transition: box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
        background: black;
    }

    .card img {
        max-width: 100%;
        border-radius: 5px;
    }

    .card h3 {
        margin-bottom: 10px;
    }

    .card p {
        /* display: none;
        margin-top: 10px; */
    }

    .card:hover .event-description {
        display: block;
    }

    @media screen and (max-width: 768px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }
    }

    .event-description {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        z-index: 1;
        /* Ensures the description is above the image */
    }
</style>
<style>
    .banner-slider {
        max-width: 100%;
        overflow: hidden;
        position: relative;
        margin-top: -150px;
        height: 400px;
    }


    .slide {
        display: none;
    }

    .slide img {
        width: 100%;
        height: auto;
    }

    .caption {
        position: absolute;
        bottom: 20px;
        left: 20px;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        font-size: 16px;
        overflow: hidden;
        /* Hide overflowing characters */
        white-space: nowrap;
        /* Don't wrap the text */
        animation: typing 4s steps(60, end);
        /* Animation duration and steps */

    }

    @media screen and (max-width: 768px) {
        .caption {
            font-size: 14px;
            bottom: 10px;
            left: 10px;
            padding: 5px;
        }
    }

    /* Define the typing animation */
    @keyframes typing {
        from {
            width: 0;
            /* Start with no characters visible */
        }

        to {
            width: 100%;
            /* Fully reveal all characters */
        }
    }

     /* Styling for the popup */
     .popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        border: 2px solid;
        border-color: #CF9C2C;
    }

    .popup-content {
        background-color: rgba(0, 0, 0, 0.7);
        /* Set a black transparent background */
        padding: 20px;
        border: 2px solid;
        border-color: #CF9C2C;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 90%;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        color: #CF9C2C;
    }

    /* Styling for the form */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #submit {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Add media query for responsiveness */
    @media screen and (max-width: 600px) {
        .popup-content {
            max-width: 90%;
        }
    }
</style>
<!-- Include jQuery library -->
<script>
    $(document).ready(function() {
        const slides = $(".slide");
        let currentIndex = 0;

        function showSlide(index) {
            slides.hide();
            slides.eq(index).fadeIn(800);

            // Reset the typing animation for each caption
            $(".caption").css("animation", "none");
            setTimeout(function() {
                $(".caption").css("animation", "typing 4s steps(60, end)");
            }, 100);
        }

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Change slide every 5 seconds (adjust the interval as needed)
        setInterval(showNextSlide, 9000);

        // Show the first slide initially
        showSlide(currentIndex);

        // Get the popup and the button that opens and closes it
         popupContainer = $('#popupContainer');
         closePopupBtn = $('#closePopupBtn');

        // Function to open the popup
        $('.openPopupBtn').on('click', function(){

            $('#event_id').attr('value', $(this).data('event'));
            popupContainer.fadeIn();
            $('.popup-container').css('display', 'flex');
        });

        // Function to close the popup
        function closePopup() {
            popupContainer.fadeOut();
        }

        // Event listeners to open and close the popup
        closePopupBtn.on('click', closePopup);
    });
</script>

<main role="main">
    <section class="intro">
        <div class="container">
            <div class="row d-flex  align-items-start">
                <div class="col-md-12">
                    <div class="banner-slider">
                        <div class="slide">
                            <img src="/arts_images/pexels-steve-johnson-1509534.jpg" alt="Slide 1">
                            <div class="caption">Unveiling the Soul of Africa: Delve into the captivating world of African arts and stories, where each piece <br> carries the echoes of ancient traditions and the wisdom of a diverse and vibrant culture.</div>
                        </div>
                        <div class="slide">
                            <img src="/arts_images/pexels-steve-johnson-1269968.jpg" alt="Slide 1">
                            <div class="caption">Tales of the Savannah: African arts narrate the rich tapestry of history, spirituality, and identity. <br> From intricately carved masks to mesmerizing beadwork, the artistry tells stories that connect the past to the present.</div>
                        </div>
                        <div class="slide">
                            <img src="/arts_images/pexels-daian-gan-102127.jpg" alt="Slide 2">
                            <div class="caption">Expressions of Ancestral Heritage: Step into the realm of African arts and encounter a legacy that transcends generations. <br> Through sculptures, textiles, and paintings, the stories of resilience, unity, and creativity find a voice.</div>
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
                    <span class="@if($art->status == 1) badge-rouge @elseif($art->status == 0) badge-vert @endif">@if($art->status == 1) Sold @endif</span>
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