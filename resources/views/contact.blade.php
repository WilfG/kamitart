@extends('frontLayouts.index')

@section('main')
<main role="main">
    <section class="pt-4">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-start">
                <div class="col-md-6">
                    <figure><img src="./assets/img/photo-1484755560615-a4c64e778a6c.jpg" alt="" class="img-fluid">
                    </figure>
                </div>
                <!-- end:col -->
                <div class="col-md-6 pl-lg-5 pl-md-5">
                    <h2>
                        Get in touch with us
                    </h2>
                    <p class="lead mt-4">Welcome to our art website's contact page! We value your feedback, inquiries, and thoughts about our artistic endeavors. Whether you're an art enthusiast, an aspiring artist, or an event organizer seeking collaboration, we're thrilled to hear from you. Our dedicated team is here to assist you with any questions, provide information about upcoming events, or guide you through our curated collection of awe-inspiring artworks. Don't hesitate to drop us a message using the form below. We promise to respond promptly and make your art journey with us a delightful and unforgettable experience. Thank you for being a part of our creative community!</p>
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
                    <form action="contact_us" method="POST">
                        @csrf
                        <div class="contact-form mt-5">
                            <div class="form-group row">

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="message" rows="5" id="message" placeholder="Your Message..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-light font-weight-bold">Submit Your Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end:contact -->
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <p>
                                <strong>Indiana</strong>
                                <br>
                                Indianapolis
                                <br>
                                917-735-8844
                                <br>
                                2800 Alfred Drive
                            </p>
                        </div>
                        <!-- end:col -->
                        <!-- <div class="col-md-6">
                            <p>
                                <strong>California</strong>
                                <br>
                                San Diego
                                <br>
                                917-735-8844
                                <br>
                                1897 Holden Street
                            </p>
                        </div> -->
                        <!-- end:col -->
                    </div>
                </div>
                <!-- end:col -->
            </div>
            <hr class="mt-5">
        </div>
    </section>
</main>
@include('art_request_popup')

@endsection