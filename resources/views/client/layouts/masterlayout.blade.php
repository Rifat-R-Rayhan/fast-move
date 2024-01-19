<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>First Move</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="/frontend/img/delivery-bike.png" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

           <!-- Botman -->
           <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

        <!-- Libraries Stylesheet -->
        <link href="/frontend/lib/animate/animate.min.css" rel="stylesheet">
        <link href="/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/frontend/css/style.css" rel="stylesheet">

      
    </head>

    <body>
        <div class="container-xxl bg-white p-0">
            <!-- Spinner Start -->
            <div id="spinner"
                class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

            <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="m-0"><img src="frontend/img/delivery-bike.png" width="60">Fast Move</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0 me-5">
                            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                            <a href="{{ route('service') }}" class="nav-item nav-link">Services</a>
                            <a href="{{route('tracking')}}" class="nav-item nav-link">Tracking</a>
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tracking</a>
                                <div class="dropdown-menu m-0">
                                    <a href="team.html" class="dropdown-item">Our Team</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="comparison.html" class="dropdown-item">Comparison</a>
                                </div>
                            </div> --}}
                            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                        </div>
                        {{-- <button type="button" class="btn text-secondary ms-3" data-bs-toggle="modal"
                            data-bs-target="#searchModal"><i class="fa fa-search"></i></button> --}}

                        <a href="{{ route('register') }}" class="btn btn-dark py-2 px-4 ms-3">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-dark py-2 px-4 ms-3">Login</a>


                    </div>
                </nav>
            </div>
            <!-- Navbar & Hero End -->

            <!-- Full Screen Search Start -->
            <div class="modal fade" id="searchModal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content" style="background: rgba(29, 40, 51, 0.8);">
                        <div class="modal-header border-0">
                            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex align-items-center justify-content-center">
                            <div class="input-group" style="max-width: 600px;">
                                <input type="text" class="form-control bg-transparent border-light p-3"
                                    placeholder="Type search keyword">
                                <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Screen Search End -->


            @hasSection('content')
                @yield('content')
            @else
                <h1 style="text-align: center;">Here is no content...</h1>
            @endif


            <!-- Footer Start -->
            <div class="container-fluid bg-warning text-white footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="row gy-5 gx-4 pt-5">
                        <div class="col-12">
                            <h5 class="fw-bold text-white mb-4">Subscribe Our Newsletter</h5>
                            <div class="position-relative" style="max-width: 400px;">
                                <input class="form-control bg-white border-0 w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Enter your email">
                                <button type="button"
                                    class="btn btn-dark py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="row gy-5 g-4">
                                <div class="col-md-6">
                                    <h5 class="fw-bold text-white mb-4">About Us</h5>
                                    <a class="btn btn-link" href="">About Us</a>
                                    <a class="btn btn-link" href="">Contact Us</a>
                                    <a class="btn btn-link" href="">Privacy Policy</a>
                                    <a class="btn btn-link" href="">Terms & Condition</a>
                                    <a class="btn btn-link" href="">Support</a>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="fw-bold text-white mb-4">Our Services</h5>
                                    <a class="btn btn-link" href="">Domain Register</a>
                                    <a class="btn btn-link" href="">Shared Hosting</a>
                                    <a class="btn btn-link" href="">VPS Hosting</a>
                                    <a class="btn btn-link" href="">Dedicated Hosting</a>
                                    <a class="btn btn-link" href="">Reseller Hosting</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h5 class="fw-bold text-white mb-4">Get In Touch</h5>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, Dhaka</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>quickexpress@gmail.com</p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-lg-n5">
                            <div class="bg-light rounded" style="padding: 30px;">
                                <input type="text" class="form-control border-0 py-2 mb-2" placeholder="Name">
                                <input type="email" class="form-control border-0 py-2 mb-2" placeholder="Email">
                                <textarea class="form-control border-0 mb-2" rows="2" placeholder="Message"></textarea>
                                <button class="btn btn-dark w-100 py-2">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-lg-5">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy;2024. First Move Logistics Ltd. All Right Reserved.

                                Designed By <a class="border-bottom text-decoration-none" href="https:/mystrix.site">Mystrix</a>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="">Home</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            {{-- <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a> --}}
        </div>

        <script>
            var botmanWidget = {
                // frameEndpoint: '/iFrameUrl'
                title: 'Fast Move Logistics',
                aboutText:'Webappfix',
                introMessage: 'Hi, welcome to fastest logistics service Fast Move Logistics.'  
            };
        </script>
    <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="frontend/lib/wow/wow.min.js"></script>
        <script src="frontend/lib/easing/easing.min.js"></script>
        <script src="frontend/lib/waypoints/waypoints.min.js"></script>
        <script src="frontend/lib/counterup/counterup.min.js"></script>
        <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="frontend/js/main.js"></script>
    </body>

    </html>