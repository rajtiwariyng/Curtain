@extends('frontend.layouts.app')

@section('title', 'About Us')
@section('header_img')
<img class="header-img" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">About</a>
    </div>
    <h1 class="text-white NewKansas-medium">About Us</h1>
</div>
@endsection
@section('content')


<section class="mki wrapper container-fluid" style="margin-top:148px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="images/india-map.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <h2 class="NewKansas-medium">Make in India</h2>
                <p>With an unwavering commitment to customer satisfaction, exceptional craftsmanship, and seamless
                    installation, you are assured that your order is crafted with precision and care by some of India’s
                    most skilled and experienced curtain makers. Our competitive pricing ensures that quality remains
                    accessible to all. </p>
                <p>Rooted in multi-generational expertise, we produce our curtains locally in collaboration with some of
                    the nation’s finest textile mills, guaranteeing premium fabrics and impeccable design. </p>
                <p>Our diverse range features stylish borders, refined stitching techniques, durability and high-quality
                    hardware. Despite the variety, we remain steadfast in our promise: to deliver superior quality and
                    affordability without compromise.</p>

            </div>
        </div>
    </div>
</section>


<section class="services wrapper bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h2 class="NewKansas-medium">A Legacy of 30 years</h2>
                <p>For three generations, we have been at the heart of the furnishing industry's evolution. From our
                    modest beginnings as a single store on a vibrant Delhi street, we have grown into a proud PAN-India
                    solution provider in the furnishing sector. Guided by the belief that every home tells a unique
                    story, we continually adapt and innovate to meet the diverse needs of our customers.</p>
                <p>Our offerings celebrate the rich cultural heritage of the regions we serve, ensuring a touch of
                    uniqueness for every space. Embracing learning as a cornerstone of our growth, we stay ahead by
                    incorporating global trends into our carefully curated collections, keeping your spaces stylish,
                    modern, and timeless.</p>
                <div class="services-tab">
                    <a class="NewKansas-regular active" href="#" data-target="livingRoom">Living Room</a>
                    <a class="NewKansas-regular" href="#" data-target="bedroom">Bedroom</a>
                    <a class="NewKansas-regular" href="#" data-target="office">Office</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="service-carousel owl-carousel owl-theme">
                    <!-- Carousel items will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 
<section class="legacy w-75 m-auto wrapper">
    <div class="container text-center">
        <h2 class="text-center NewKansas-medium mb-4">Our Legacy</h2>
        <p class="mb-4">For three generations, we have witnessed the evolution of the furnishing industry. From
            our humble beginnings as a single store on a bustling street in Delhi, we have grown into a proud
            PAN India solution provider in the furnishing sector.</p>

        <div class="card w-100 legacy-card">
            <p>We have consistently evolved, driven by our belief that every home is unique. Our diverse
                offerings reflect the rich cultural tapestry of the regions we serve, ensuring something special
                for everyone.</p>
        </div>
        <p>Learning is part of our journey. We stay attuned to the latest global trends, incorporating them into
            our thoughtfully curated collections to keep our customers’ spaces stylish and up-to-date.</p>
    </div>
</section> -->


<!-- our story section -->
<section class="ourstory wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/storyLeftImg.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center">
                <div class="card storycard">
                    <h4>Our story</h4>
                    <p>At Curtains and Blinds (CAB), we are your ultimate destination for trendy and hassle-free Curtain
                        solutions. Dedicated to simplifying your window dressing, we offer a wide range of stylish
                        Curtains and Blinds - all conveniently accessible from the comfort of your home.</p>
                    <p>Choosing the perfect décor can feel overwhelming, but CAB makes it effortless. Our expert team
                        takes the guesswork out of the process and handpicks the latest designs to suit your style and
                        preferences, delivering tailored solutions just for you. Whether you lean toward minimalist
                        sophistication, bold patterns, or a blend of both, we have something to match every aesthetic.
                    </p>
                    <p>At CAB, we don’t just provide furnishings; we create spaces you’ll love to live in.</p>
                    <a href="#" class="primary-btn">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 
<section class="cab-usp container-fluid bg-dark wrapper">
    <div class="container">
        <h2 class="NewKansas-medium text-center text-white mb-4">The CAB strengths</h2>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card uspCard d-flex justify-content-center align-items-center flex-column">
                    <img src="images/design.svg" class="mb-4" alt="">
                    <h4>In-house design team</h4>
                    <p>In-house design team creating stylish yet budget friendly curtains</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard d-flex justify-content-center align-items-center flex-column">
                    <img src="images/machine.svg" class="mb-4" alt="">
                    <h4>Fabrication unit</h4>
                    <p>State of the art Fabrication unit</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard d-flex justify-content-center align-items-center flex-column">
                    <img src="images/material.svg" class="mb-4" alt="">
                    <h4>Global sourcing</h4>
                    <p>Strong material sourcing for better pricing</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard d-flex justify-content-center align-items-center flex-column">
                    <img src="images/tech.svg" class="mb-4" alt="">
                    <h4>Technology backed</h4>
                    <p>Technology backed order fulfilment process.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section class="ourTeam wrapper container">
    <h2 class="NewKansas-medium text-center mb-4">Our Team</h2>
    <p class="w-75 m-auto text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
        printer took a galley of type and scrambled it to make a type specimen book.</p>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Devesh Sharma</h4>
                    <p class="m-0">Founder</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Raghav Sharma</h4>
                    <p class="m-0">Co-Founder</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Puneet Nikore</h4>
                    <p class="m-0">Our consultants and advisors</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Rajeev Chugh</h4>
                    <p class="m-0">Our consultants and advisors</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Suraj Mallik</h4>
                    <p class="m-0">Our consultants and advisors</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card teamCard mb-4">
                <img src="images/teamPhoto.png" alt="" class="img-fluid">
                <div class="card-content text-center">
                    <h4 class="mt-3">Amit Aurora</h4>
                    <p class="m-0">Our consultants and advisors</p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
                    <div class="card teamCardSub flex-column justify-content-between">
                        <p>“You miss 100% of the shots you don’t take” - Wayne Gretzky - Michael Scott</p>
                        <div class="social-link">
                            <a href="#"><img src="images/linkedin_C.svg" alt=""></a>
                            <a href="#"><img src="images/facebook_c.svg" alt=""></a>
                        </div>
                    </div>
                </div> -->
</section>
@endsection