@extends('frontend.layouts.app')

@section('title', 'Services')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/services" class="active">Services</a>
    </div>
    <h1 class="text-white NewKansas-medium">Our Services</h1>
</div>
@endsection
@section('content')
<section class="container wrapper m-100">
    <div class="row align-items-center">
        <div class="col-md-6 wow animate__animated animate__fadeIn">
            <h3 class="NewKansas-medium">It is all about the customer experience</h3>
            <p class="text-justify">We are committed to delivering an exceptional customer experience, offering a wide range of trendy and
                stylish window furnishings, all from the comfort of your home. Adopting a zero-clutter approach, we
                ensure you can explore materials at your convenience, allowing you to make informed decisions alongside
                your loved ones. Our products are not only affordable, but the entire process is hassle-free, with every
                order backed by a guarantee of quality.
            </p>
        </div>
        <div class="col-md-6 wow animate__animated animate__fadeIn">
            <img src="{{ asset('frontend/images/about-section-right-2.svg') }}" alt="" class="img-fluid">
        </div>
    </div>
</section>

<section class="bg-white wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <img src="{{ asset('frontend/images/sec-img.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <!-- <h3 class="NewKansas-medium">We are here to help</h3> -->
                <p class="text-justify">Our stitching facility offers skilled craftsmanship, precision and customization to create
                    high-quality, tailor-made curtains ensuring the final product meets the exact specifications of the
                    client.
                </p>
                <p class="text-justify">Our capacity to work with different types of fabrics, including delicate materials, heavy-duty
                    fabrics, or specialty textiles like velvet, linen, or fire-retardant fabrics, we ensure attention to
                    seamless transitions in fabric alignment, especially for complex or bespoke designs like the
                    patterns, seams, hems and finishes. The rigorous inspection of stitching guarantees quality control
                    and fast turnaround</p>
            </div>
        </div>
    </div>
</section>


<!-- product-showcase -->
<section class="showcase-product wrapper">
    <div class="container">
        <h2 class="NewKansas-medium text-center mb-4">Types of Curtains & Blinds</h2>
        <div class="product-collection">
            <ul class="nav nav-pills mb-3 wow animate__animated animate__fadeIn" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active NewKansas-regular" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-curtains"
                        aria-selected="true">Curtains</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link NewKansas-regular" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-blinds"
                        aria-selected="false">Blinds</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link NewKansas-regular" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-accessories"
                        aria-selected="false">Accessories</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link NewKansas-regular" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-hardware"
                        aria-selected="false">Hardware</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="service-card-carousel owl-carousel owl-theme">
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/curtains1.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Printed Curtain</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/blind1.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Sheers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/curtains2.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Textured Curtain </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/curtains3.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Blackout Curtains</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/curtains4.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Embroidered Curtains</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="service-card-carousel owl-carousel owl-theme">
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/blind2.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Sheer Blind</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/blind3.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Roman Blind</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/blind4.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Roman Blind</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/blind5.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Vertical Blinds</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <!--<div class="col-md-4">-->
                        <!--    <div class="card product-card"-->
                        <!--        style="height:auto !important; min-height:fit-content !important;">-->
                        <!--        <img src="{{ asset('frontend/images/accessories1.png') }}" alt="">-->
                        <!--        <div class="card-body p-0 pt-3 text-center NewKansas-medium">-->
                        <!--            <h5>Curtain Hooks</h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-4">-->
                        <!--    <div class="card product-card"-->
                        <!--        style="height:auto !important; min-height:fit-content !important;">-->
                        <!--        <img src="{{ asset('frontend/images/accessories2.png') }}" alt="">-->
                        <!--        <div class="card-body p-0 pt-3 text-center NewKansas-medium">-->
                        <!--            <h5>Curtain Hooks</h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-4">-->
                        <!--    <div class="card product-card"-->
                        <!--        style="height:auto !important; min-height:fit-content !important;">-->
                        <!--        <img src="{{ asset('frontend/images/accessories3.png') }}" alt="">-->
                        <!--        <div class="card-body p-0 pt-3 text-center NewKansas-medium">-->
                        <!--            <h5>Curtain Pull Rod</h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="service-card-carousel owl-carousel owl-theme">
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/Accessories1.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Belts</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/Accessories2.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Tassels</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/Accessories3.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Borders</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/Accessories4.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Under Hooks</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/Accessories5.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Under Curtain Pull Rod</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="service-card-carousel owl-carousel owl-theme">
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/handware1.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Ripple Track</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/handware2.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Flat Track</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/handware3.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>M Track</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card product-card"
                                    style="height:auto !important; min-height:fit-content !important;">
                                    <img src="{{ asset('frontend/images/handware4.png') }}" alt="">
                                    <div class="card-body p-0 pt-3 text-center NewKansas-medium">
                                        <h5>Curtain Rods</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container wrapper wow animate__animated animate__fadeIn" style="padding-top:0px !important;">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">Reimagine Your Home with OUR CURTAINS AND BLINDS</h2>
            <p>Schedule your design consultation today – let’s bring your dreams to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Book Your
            Appointment</a>
    </div>
</section>
@endsection