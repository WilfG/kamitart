<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Free minimal portfolio web site template,minmal portfolio,porfolio,bootstrap template,html template,photography " />
    <title>KamitArt</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.min.css">
    <link rel="stylesheet" href="/assets/css/rtl.css">
    <link rel="stylesheet" href="/custom.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('styles')

</head>

<body>
    <div class="nav-main">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand font-weight-bold" href="/">Artfric</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-lg-3 col-md-3"></div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('our-arts')}}">Arts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blog')}}">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">

                    </ul>
                </div>
                <div class="col-lg-2 col-md-2"><button class="requestArtBtn" id="request_art">Request An Art</button></div>
                <button class="requestArtBtnMobile" id="request_artMobile">Request An Art</button>
            </nav>
            <!--end:Nav -->
        </div>
    </div>

    <!--end:Navigation -->
    @yield('main')
    <footer class="position-relative">
        <div class="container">
            <div class="row">

                <!-- <div class="col-lg-auto mt-4">
                    <p class="mb-4">sharebootstrap.com</p>
                </div> -->
                <div class="col-lg-4 mt-4 ml-auto">
                    <p>dayy GmbH
                        <br> Indianapolis. 32
                        <br> 71000 Indiana
                        <br> fbih
                    </p>
                    <a href="mailto:hi@yourdomain.com"><span style="text-decoration: underline;">contact@kamitartworld.com</span></a>
                </div>
                <div class="col-lg-4 mt-4 ml-auto">
                    <ul class="list-unstyled footer-link">
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/our-arts">Categories</a></li>
                    </ul>
                </div>
                <div class="col-lg-auto ml-lg-auto mt-4">
                    <ul class="list-unstyled footer-link">
                        <li><a href="#">instagram</a></li>
                        <li><a href="#">facebook</a></li>
                        <li><a href="#">twitter</a></li>
                        <!-- Please note.You are not allowed to remove credit link.Please respect that.-->
                        <!-- <li><a href="https://sharebootstrap.com">dev by sharebootstrap</a></li> -->
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </footer>
   
    <script src="/custom.js"></script>
    <script src="/assets/js/main.min.js"></script>
    @stack('scripts')
</body>

</html>