@extends('frontLayouts.index')

@section('main')
<main role="main">
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="project-sidebar">
                        <!-- Place your project images here -->
                        @foreach($arts as $art)
                            <figure><a href="{{route('art.show', $art->id)}}"><img src="/arts_images/{{$art->artPath}}" alt="" class="img-fluid"></a></figure>
                        @endforeach
                    </div>
                </div>
                <!-- end:col -->
                <div class="col-md-5 pl-lg-5 pl-md-5">
                    <div class="sticky-top pt-5">
                        <h1>
                            <!-- Product photography -->
                            {{$artist->firstname . ' ' . $artist->lastname}}
                        </h1>
                        <p class="lead mt-4"><u>Bio</u> <br>{{$artist->bio}}</p>
                        <hr class="mt-5">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <p>
                                    <strong>State :{{$artist->a_state}}</strong><br>
                                    <!-- <strong>City : {{$artist->a_city}}</strong><br>
                                    <br>Birthdate :{{$artist->birthdate}} -->
                                </p>
                                <p><strong>Country :{{$artist->a_country}}</strong>
                                    <!-- <br>Address :{{$artist->address}} -->
                                </p>
                            </div>

                        </div>
                        <!-- end:col -->
                    </div>
                </div>
            </div>
            <!-- end:row -->
            <hr class="mt-5">
        </div>
    </section>
</main>
@endsection