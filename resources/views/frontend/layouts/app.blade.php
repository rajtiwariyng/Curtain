<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Curtains & Blinds')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/variables.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/CSS/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/about.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/CSS/franchise.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <!-- Animate JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @stack('styles')
</head>

<body>
    <div id="top" style="visbility: hidden"></div>
    <a href="#top" class="scrollToTopBtn" type="button"><i class="bi bi-arrow-up-short"></i></a>
    <a href="/appointments" class="ctaBtn wow animate__animated animate__fadeIn" type="button">Book Your
        Appointment</i></a>


    <div class="container-fluid main p-0">
        <div class="mob_menu fixed-top">
            <div><a href="/"><img class="logo" src="{{ asset('frontend/images/logo.svg') }}" alt=""></a></div>
            <button class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                Menu <i class="bi bi-list"></i>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav mob_nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/our_products">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/how">How do we work</a>
                        </li>
                        <li class="nav-item">
                            <a href="/franchise-registration" class="nav-link primary-line-btn pe-4 ps-4 mt-4">Franchise
                                Registration</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('header_img')

        <div class="container">
            <!-- header started -->
            @include('frontend.layouts.header')
            <!-- header Ends -->

            @yield('hero')
        </div>
        @yield('content')

        <!-- footer -->
        @include('frontend.layouts.footer')
    </div>

    <!-- bootstrap-script -->
    <!-- Jquery JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
        
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('frontend/JS/home.js') }}"></script>
    <script src="{{ asset('frontend/JS/form-submit.js') }}"></script>
    <script src="{{ asset('frontend/JS/franchiseForm.js') }}"></script>
    <script src="{{ asset('frontend/JS/menu.js') }}"></script>
</body>

</html>