@extends('frontLayouts.index')

@section('main')
<main role="main">
    <section class="intro">
        <div class="container">
            <div class="row d-flex  align-items-start">
                <div class="col-md-11">
                    <h1 class="display-3">The Art of Imagination.<br>Award-winning Design &amp; Craft Studio.</h1>
                </div>
            </div>
        </div>
    </section>
    <!--end:Intro -->
    <section class="space-md">
        <!-- portfolio -->
        <div id="portfolio" class="container">
            <div id="portfolio-filters">
                <ul id="filters" class="p-0">
                    <li><a href="*" class="active">Tout</a></li>
                    <li><a href=".digital">Contemporain</a></li>
                    <li><a href=".branding">Médiéval</a></li>
                    <li><a href=".campaigns">Marketing</a></li>
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
                <div class="entry work-entry {{$art->title}}">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="{{ asset('/arts_images/'. $art->artPath) }}"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">{{$art->title}}</div>
                                <div class="work-entry-cat">by {{$artist_name}}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- end:entry -->
                <div class="entry work-entry digital">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1558180702-95f1c3ae2ca3.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Aramark</div>
                                <div class="work-entry-cat">Marketing</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end:entry -->
                <!-- <div class="entry work-entry campaigns">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1558118720-fa5cdebe6b3a.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Portfolio page</div>
                                <div class="work-entry-cat">web design</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->
                <!-- <div class="entry work-entry branding">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1558100984-01e6cd6fc9aa.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Sunday Breakfast</div>
                                <div class="work-entry-cat">Branding</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->
                <!-- <div class="entry work-entry campaigns h2">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1494475673543-6a6a27143fc8.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Sunday Breakfast</div>
                                <div class="work-entry-cat">All</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->
                <!-- <div class="entry work-entry branding digital">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1557941760-987c3f403d5a.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Pine Street</div>
                                <div class="work-entry-cat">Web + Digital</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->
                <!-- <div class="entry work-entry digital">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1534073828943-f801091bb18c.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Mobipaid</div>
                                <div class="work-entry-cat">Branding</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->
                <!-- <div class="entry work-entry brading">
                    <a href="project.html">
                        <div class="entry-image imageBG" data-img="./assets/img/photo-1484755560615-a4c64e778a6c.jpg"></div>
                        <div class="work-entry-hover">
                            <div class="work-entry-content">
                                <div class="work-entry-title">Solo Solution</div>
                                <div class="work-entry-cat">Logo</div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- end:entry -->


            </div>
        </div>
        <!-- /end:portfolio -->
    </section>
</main>
@endsection