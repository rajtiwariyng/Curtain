@extends('frontend.layouts.app')

@section('title', 'Home')
@section('header_img')
<img class="header-img homeBanner wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/header-image.png') }}" alt="">
@endsection
@section('hero')
<!-- hero-section -->
<section class="hero">
    <div class="hero-content wow animate__animated animate__fadeIn">
        <h1>Choose Designer, Trendy and Budget-Friendly Curtains, Stitched and Delivered in the comfort of your home!</h1>
        <!--<p>crafted with elegance and functionality in the comfort of your home</p>-->
        <div class="hero-cta d-flex justify-content-start wow animate__animated animate__fadeIn">
            <!--<a href="/appointments" class="primary-btn me-3">Book Your Appointment</a>-->
            <!-- <button class="primary-btn" data-bs-toggle="modal" data-bs-target="#BookHomeModal">Book for
                Office</button> -->
        </div>
    </div>
</section>
@endsection
@section('content')

<section class="cab-usp container-fluid bg-white wrapper">
    <div class="container wow animate__animated animate__fadeIn">
        <h2 class="NewKansas-medium text-center mb-4 wow animate__animated animate__fadeIn">THE CAB STRENGTH</h2>
        <!--<div class="row">-->
        <!--    <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">-->
        <!--        <div class="card uspCard d-flex justify-content-center align-items-center flex-column">-->
        <!--            <img src="{{ asset('frontend/images/design.svg') }}" class="mb-4" alt="">-->
        <!--            <h4>In-house design team</h4>-->
        <!--            <p>In-house design team creating stylish yet budget friendly curtains</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">-->
        <!--        <div class="card uspCard d-flex justify-content-center align-items-center flex-column">-->
        <!--            <img src="{{ asset('frontend/images/machine.svg')}}" class="mb-4" alt="">-->
        <!--            <h4>Fabrication unit</h4>-->
        <!--            <p>State of the art Fabrication unit</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">-->
        <!--        <div class="card uspCard d-flex justify-content-center align-items-center flex-column">-->
        <!--            <img src="{{ asset('frontend/images/material.svg') }}" class="mb-4" alt="">-->
        <!--            <h4>Global sourcing</h4>-->
        <!--            <p>Strong material sourcing for better pricing</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">-->
        <!--        <div class="card uspCard d-flex justify-content-center align-items-center flex-column">-->
        <!--            <img src="{{ asset('frontend/images/tech.svg') }}" class="mb-4" alt="">-->
        <!--            <h4>Technology backed</h4>-->
        <!--            <p>Technology backed order fulfilment process.</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard d-flex justify-content-start align-items-center flex-column">
                    <img src="{{ asset('frontend/images/usp1.png') }}" class="mb-4" alt="">
                    <h4>IN-HOUSE DESIGN TEAM</h4>
                    <p class="m-0">In-house design team creating stylish yet budget friendly curtains</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard d-flex justify-content-start align-items-center flex-column">
                    <img src="{{ asset('frontend/images/usp14.png')}}" class="mb-4" alt="">
                    <h4>FABRICATION UNIT</h4>
                    <p class="m-0">Modern and well equipped infrastructure with skilled work force</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard d-flex justify-content-start align-items-center flex-column">
                    <img src="{{ asset('frontend/images/usp2.png') }}" class="mb-4" alt="">
                    <h4>GLOBAL SOURCING</h4>
                    <p class="m-0">Strong material sourcing for better pricing</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard d-flex justify-content-start align-items-center flex-column">
                    <img src="{{ asset('frontend/images/usp4.png') }}" class="mb-4" alt="">
                    <h4>TECHNOLOGY BACKED</h4>
                    <p class="m-0">Technology backed order fulfilment process.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product-showcase -->
<!-- <section class="showcase-product wrapper">
    <div class="container">
        <h2 class="NewKansas-medium text-center mb-4">Now choosing and ordering curtains and blinds from <br>the
            comfort of your home or office is easy.</h2>
        <div class="product-collection">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-stylise"
                        aria-selected="false">Stylise</button>
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
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/pro-1.png" alt="">
                                <div class="card-body p-4">
                                    <h4>We spoil you for choice</h4>
                                    <p class="m-0 text-color">Plenty of options with over 800 SKUs, yet
                                        clutter-free. A perfect fusion of physical and digital experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/pro-2.png" alt="">
                                <div class="card-body p-4">
                                    <h4>Find your perfect match</h4>
                                    <p class="m-0 text-color">Make informed choices and experience the products
                                        firsthand. Match the fabrics to real surroundings- So no guess work</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/pro-3.png" alt="">
                                <div class="card-body p-4">
                                    <h4>Affordable and budget friendly</h4>
                                    <p class="m-0 text-color">At CAB we ensure that you get Honest pricing. No
                                        haggling, No material wastage. Only the original, Receive the final
                                        product as selected.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/blinds1.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">We offer the perfect blinds to complement the
                                        bohemian style of your décor. Pair them with our sheer blinds that
                                        beautifully enhance your main curtains for a cohesive, stylish look.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/blinds2.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Sheer Curtains</h4>
                                    <p class="m-0 text-color">No space to install blinds outside? Don’t worry,
                                        we’ve got you covered with solutions tailored to fit your space
                                        perfectly. Not only that, we can add the borders to add to the drama</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/blinds3.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">Why settle for boring. Enjoy playing around with
                                        prints and jaquards and add to the flovour. Match it or contrast it with
                                        your curtains for that designer look</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/Stylise1.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">Why settle for boring? Our design team ensures you
                                        stay up-to-date with the latest trends and styles, offering the perfect
                                        blend of physical and digital presentations to bring your vision to
                                        life.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/Stylise2.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">At Curtains and Blinds, we offer a variety of
                                        value-added options such as borders and embroideries to elevate your
                                        design and seamlessly coordinate with your existing art and décor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/Stylise3.jpg" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">Perfection lies in the details, and at Curtains
                                        and Blinds, we get it right the first time. Our expert consultants will
                                        visit your space and help you style your windows with the perfect
                                        selection of textures and colors, adding that extra touch with valuable
                                        enhancements.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">
                    <div class="row" style="margin-top: 42px;">
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/handware1.png" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">No coves? No problem! We have the perfect solution
                                        for you. Our flat tracks are smart, trendy, and available in a variety
                                        of colors to complement your décor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/handware2.png" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">Why settle for boring and outdated? Our sleek
                                        round channels come in a variety of exciting colors to enhance your
                                        décor and add a modern touch.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="images/pro-3.png" alt="">
                                <div class="card-body p-4">
                                    <h4>Blockout Curtains</h4>
                                    <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                        window blinds for your home. Our experienc...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="showcase-product wrapper">
    <div class="container">
        <h2 class="NewKansas-medium text-center mb-4 wow animate__animated animate__fadeIn">NOW, SELECTING AND ORDERING CURTAINS AND BLINDS
FROM THE COMFORT OF YOUR HOME OR OFFICE
HAS NEVER BEEN EASIER</h2>
        <div class="product-collection">
            <div class="row" style="margin-top: 42px;">
                <div class="col-md-4 wow animate__animated animate__fadeIn">
                    <div class="card product-card">
                        <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                        <div class="card-body p-4">
                            <h4>We spoil you for choice</h4>
                            <p class="m-0 text-color text-justify">With over 800 SKUs, we offer plenty of options while keeping the
                                experience clutter-free. It’s the perfect blend of physical and digital convenience,
                                tailored just for you.</p>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4 wow animate__animated animate__fadeIn">
                    <div class="card product-card">
                        <img src="{{ asset('frontend/images/pro-5.png') }}" alt="">
                        <div class="card-body p-4">
                            <h4>Find your perfect match</h4>
                            <p class="m-0 text-color text-justify">Make informed decisions by experiencing our products firsthand.
                                Match fabrics to your actual surroundings, eliminating guesswork and ensuring the
                                perfect fit for your space.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__fadeIn">
                    <div class="card product-card">
                        <img src="{{ asset('frontend/images/pro-3.png') }}" alt="">
                        <div class="card-body p-4">
                            <h4>Affordable and budget-friendly</h4>
                            <p class="m-0 text-color text-justify">At CAB, we ensure genuine pricing with no haggling and zero
                                material wastage. What you see is what you get—authentic materials and the final product
                                exactly as you selected.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="services wrapper">
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-5">
            <h2 class="NewKansas-medium">A Legacy of 30 years</h2>
            <div class="services-tab">
                <a class="NewKansas-regular active" href="#">Living Room</a>
                <a class="NewKansas-regular" href="#">Bedroom</a>
                <a class="NewKansas-regular" href="#">Office</a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="service-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="card product-card">
                        <img src="images/livingRoom1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                window blinds for your home. Our experienc...</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card product-card">
                        <img src="images/livingRoom2.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                window blinds for your home. Our experienc...</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card product-card">
                        <img src="images/livingRoom1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                window blinds for your home. Our experienc...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->


<!-- <section class="services wrapper">
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-5">
            <h2 class="NewKansas-medium">A Legacy of 30 years</h2>
            <div class="services-tab">
                <a class="NewKansas-regular active" href="#" data-target="livingRoom">Living Room</a>
                <a class="NewKansas-regular" href="#" data-target="bedroom">Bedroom</a>
                <a class="NewKansas-regular" href="#" data-target="office">Office</a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="service-carousel owl-carousel owl-theme">
                
                <div class="item livingRoom">
                    <div class="card product-card">
                        <img src="images/livingRoom1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Stylish window blinds for your living room...</p>
                        </div>
                    </div>
                </div>
                <div class="item livingRoom">
                    <div class="card product-card">
                        <img src="images/livingRoom1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Stylish window blinds for your living room...</p>
                        </div>
                    </div>
                </div>
                <div class="item livingRoom">
                    <div class="card product-card">
                        <img src="images/livingRoom1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Blockout Curtains</h4>
                            <p class="m-0 text-color">Stylish window blinds for your living room...</p>
                        </div>
                    </div>
                </div>

                
                <div class="item bedroom d-none">
                    <div class="card product-card">
                        <img src="images/blinds1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Comfortable Bedding</h4>
                            <p class="m-0 text-color">Relax with our premium bedding options...</p>
                        </div>
                    </div>
                </div>
                <div class="item bedroom d-none">
                    <div class="card product-card">
                        <img src="images/blinds1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Comfortable Bedding</h4>
                            <p class="m-0 text-color">Relax with our premium bedding options...</p>
                        </div>
                    </div>
                </div>
                <div class="item bedroom d-none">
                    <div class="card product-card">
                        <img src="images/blinds1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Comfortable Bedding</h4>
                            <p class="m-0 text-color">Relax with our premium bedding options...</p>
                        </div>
                    </div>
                </div>
                <div class="item bedroom d-none">
                    <div class="card product-card">
                        <img src="images/blinds1.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Comfortable Bedding</h4>
                            <p class="m-0 text-color">Relax with our premium bedding options...</p>
                        </div>
                    </div>
                </div>

                
                <div class="item office d-none">
                    <div class="card product-card">
                        <img src="images/blinds2.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Office Blinds</h4>
                            <p class="m-0 text-color">Modern blinds for a productive workspace...</p>
                        </div>
                    </div>
                </div>
                <div class="item office d-none">
                    <div class="card product-card">
                        <img src="images/blinds2.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Office Blinds</h4>
                            <p class="m-0 text-color">Modern blinds for a productive workspace...</p>
                        </div>
                    </div>
                </div>
                <div class="item office d-none">
                    <div class="card product-card">
                        <img src="images/blinds2.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Office Blinds</h4>
                            <p class="m-0 text-color">Modern blinds for a productive workspace...</p>
                        </div>
                    </div>
                </div>
                <div class="item office d-none">
                    <div class="card product-card">
                        <img src="images/blinds2.jpg" alt="">
                        <div class="card-body p-4">
                            <h4>Office Blinds</h4>
                            <p class="m-0 text-color">Modern blinds for a productive workspace...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->


<!-- 
<section class="services wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h2 class="NewKansas-medium">A Legacy of 30 years</h2>
                <div class="services-tab">
                    <a class="NewKansas-regular active" href="#" data-target="livingRoom">Living Room</a>
                    <a class="NewKansas-regular" href="#" data-target="bedroom">Bedroom</a>
                    <a class="NewKansas-regular" href="#" data-target="office">Office</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="service-carousel owl-carousel owl-theme">

                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- testimonial-section -->
<section class="testimonial bg-dark wrapper">
    <div class="container">
        <h2 class="NewKansas-medium text-center text-white wow animate__animated animate__fadeIn mb-4">What do our customers say</h2>
        <!-- <p class="text-center text-white mb-4">We have to provide the material for this. We should be able to manage the
            blog part on our own</p> -->
        <div class="testimonial-carousel owl-carousel owl-theme wow animate__animated animate__fadeIn">
            <div class="item wow animate__animated animate__fadeIn">
                <div class="card testimonial-card">
                    <!--<h4>These guys are well priced</h4>-->
                    <p class="text-justify">"Different yet exciting concept. From start to finish, the team provided a competitive quote, and working with the designers was an absolute pleasure. The installation process was seamless, fast, and incredibly efficient. Highly recommend these guys for their professionalism and outstanding service!"</p>
                    <div class="user-info d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/user1.png') }}" alt="user" class="img-fluid me-3" style="max-width: 62px;">
                        <div>
                            <p class="NewKansas-medium m-0">Geetanjali</p>
                            <p class="m-0"><i class="bi bi-geo-alt"></i> Delhi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item wow animate__animated animate__fadeIn">
                <div class="card testimonial-card">
                    <!--<h4>These guys are well priced</h4>-->
                    <p class="text-justify">"I had an amazing experience buying curtains for my new house. The  entire team is highly experienced, offering mindful consultation to help me choose curtains that perfectly matched my home's theme and color palette. They lived up to my expectation on fabric knowledge, pricing and timely delivery. I must recommend their name for their expertise and exceptional customer experience!"</p>
                    <div class="user-info d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/user2.png') }}" alt="user" class="img-fluid me-3" style="max-width: 62px;">
                        <div>
                            <p class="NewKansas-medium m-0">Sangeeta Joshua</p>
                            <p class="m-0"><i class="bi bi-geo-alt"></i> Delhi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item wow animate__animated animate__fadeIn">
                <div class="card testimonial-card">
                    <!--<h4>These guys are well priced</h4>-->
                    <p class="text-justify">
                        "Let me start with a big thank you! Their timely visit was such a relief, as they brought their entire collection right to my home—I absolutely loved the concept, everything in one bag. I didn’t have to step out to make my selection! We were thoroughly impressed by their value-for-money pricing and professionalism. A special thanks to the designer for her professional approach, extensive product knowledge, and for helping us choose curtains that look absolutely stunning. The installers were equally impressive—skilled and knowledgeable. They did an outstanding job.We couldn’t be happier!"
                    </p>
                    <div class="user-info d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/user3.png') }}" alt="user" class="img-fluid me-3" style="max-width: 62px;">
                        <div>
                            <p class="NewKansas-medium m-0">Supriya Scott</p>
                            <p class="m-0"><i class="bi bi-geo-alt"></i> Delhi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="container wrapper">-->
<!--    <div class="CTABanner">-->
<!--        <div class="w-50">-->
<!--            <h2 class="NewKansas-medium text-white">Transform Your Space with Perfect Curtains & Blinds!</h2>-->
<!--            <p class="text-white">Schedule Your Free Design Consultation Today – Let’s Bring Your Vision to Life!</p>-->
<!--        </div>-->
<!--        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Schedule Your-->
<!--            Appointment</a>-->
<!--    </div>-->
<!--</section>-->

<!-- DIY section -->
<!-- <section class="wrapper diyProducts">
<div class="container">
    <h2 class="NewKansas-medium text-center mb-4">DIY Curtains, Blinds and Shutters</h2>
    <div class="product-collection">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active NewKansas-regular" id="pills-measure-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-measure" type="button" role="tab"
                    aria-controls="pills-curtains" aria-selected="true">Measure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link NewKansas-regular" id="pills-install-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-install" type="button" role="tab" aria-controls="pills-blinds"
                    aria-selected="false">Install</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link NewKansas-regular" id="pills-inspiration-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-inspiration" type="button" role="tab"
                    aria-controls="pills-stylise" aria-selected="false">Inspiration</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-measure" role="tabpanel"
                aria-labelledby="pills-measure-tab" tabindex="0">
                <div class="row" style="margin-top: 42px;">
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-1.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/blinds.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-3.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-install" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row" style="margin-top: 42px;">
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-1.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/shutters.png" alt="">
                            <div class="card-body p-4">
                                <h4>Sheer Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-3.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-inspiration" role="tabpanel"
                aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row" style="margin-top: 42px;">
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-1.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-2.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card bg-color">
                            <img src="images/pro-3.png" alt="">
                            <div class="card-body p-4">
                                <h4>Blockout Curtains</h4>
                                <p class="m-0 text-color">Budget Blinds is here to help you design stylish
                                    window blinds for your home. Our experienc...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
<section class="container wrapper wow animate__animated animate__fadeIn">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">Transform your space with perfect CURTAINS AND BLINDS</h2>
            <p>Schedule your design consultation today – let’s bring your dreams to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Book Your
            Appointment</a>
    </div>
</section>
@endsection