@extends('frontLayouts.index')

@section('main')<main role="main">
    <section class="pt-4">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <figure><img src="/arts_images/{{$art->artPath}}" alt="" class="img-fluid">
                    </figure>
                </div>
                <!-- end:col -->
                <div class="col-md-6 pl-lg-5 pl-md-5">
                    <h2>
                    {{$art->title}}
                        <!-- I double-majored in Illustration and Communication Arts at the Hugo Design Institute. -->
                    </h2>
                    <p class="lead mt-4">
                    {{$art->description}} <br>
                    Features :  {{$art->features}}
                        <!-- Add a description of your services. Aliquam at lorem tortor. Nulla eu sapien eu nibh dapibus ornare. Vestibulum posuere rhoncus elementum. Donec mattis luctus nisl non iaculis. Maecenas rhoncus augue nisi, id suscipit arcu luctus varius. -->
                    </p>
                    <hr class="mt-5">
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <p><strong>By  <a href="{{route('artist.show', $artist->id)}}">{{$artist->firstname . ' ' . $artist->lastname}}</a></strong>
                                <br>
                                <!-- {{$artist->state}} -->
                            </p>
                            <!-- <p><strong>{{$artist->city}}</strong>
                                <br>B.A., Film &amp; Music, 1994
                            </p> -->
                        </div>
                        <!-- <div class="col-md-6">
                            <p><strong>Associations</strong>
                                <br>
                            <p>• ABCD Bar Association, Member
                                <br>• IP Law for Creatives Association, Member-at-Large
                                <br>• Civil Rights Conservation, Secretary
                            </p>
                        </div> -->
                    </div>
                </div>
                <!-- end:col -->
            </div>
            <hr class="mt-5">
        </div>
    </section>
</main>
@endsection