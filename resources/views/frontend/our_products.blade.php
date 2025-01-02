@extends('frontend.layouts.app')

@section('title', 'Our Products')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}"
    style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/our-products" class="active">Products</a>
    </div>
    <h1 class="text-white NewKansas-medium">Our Products</h1>
</div>
@endsection
@section('content')
<section class="container-fluid wrapper main" style="margin-top:142px;">
    <div class="container">
        <div class="row mt-4 align-items-center">
            <div class="col-md-5 wow animate__animated animate__fadeIn m-auto align-items-center">
                <img src="{{ asset('frontend/images/img-9.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 wow animate__animated animate__fadeIn">
                <h2 class="NewKansas-medium wow animate__animated animate__fadeIn">Bespoke window furnishings in the
                    comfort of your home</h2>
                <p class="text-justify">With over 30 years of expertise in the industry, we specialize in crafting custom window furnishings
                    that adhere to the highest standards. Enjoy the convenience of bespoke soft furnishings from the
                    comfort of your home, with smooth delivery facilitated by our advanced production and fulfillment
                    teams. Explore our carefully curated collections, designed by skilled textile designers, and
                    complement your furnishings with matching hardware and accessories for a seamless, hassle-free
                    experience.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <h2 class="NewKansas-regular">Hospitality and commercial furnishing solutions</h2>
                <p  class="text-justify">Gone are the days of dull office spaces. Our stunning commercial furnishing solutions are designed to
                    transform and breathe new life into your workplaces creating a dynamic, inspiring and a vibrant
                    environment that inspires productivity.</p>
                <p  class="text-justify">With extensive experience collaborating with renowned hospitality chains such as Taj, Meridian, and
                    Pullman, we offer comprehensive curtain solutions for all types of hospitality projects.</p>
                <p class="text-justify">Understanding the unique needs of the hospitality industry, we provide specialized materials such as
                    blackouts, dim-outs, and fire-resistant fabrics, ensuring every requirement is met with precision
                    and
                    quality.</p>
            </div>
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <img src="{{ asset('frontend/images/img-8.png') }}" class="img-fluid" alt="" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<section class="container wrapper">
    <div class="row align-items-center">
        <div class="col-md-6 mb-3 wow animate__animated animate__fadeIn">
            <img src="{{ asset('frontend/images/img-10.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 wow animate__animated animate__fadeIn">
            <h2 class="NewKansas-medium">Trendy designs</h2>
            <h1 style="color: #8E2D1F;" class="mb-4">@ Genuine pricing</h1>

            <p class="text-justify">Less is more. Why settle for the ordinary? Today’s design language embraces minimalism and a
                clutter-free aesthetic, yet remains trendy and interesting. At CAB, we ensure that these
                principles are brought to life in every design.</p>
        </div>
    </div>
</section>



<!-- FAQ -->

    <div class="container">
        <h2 class="NewKansas-medium text-center mb-4">Frequently Asked Questions</h2>
        <div class="w-75 m-auto wow animate__animated animate__fadeIn">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            How long will it take for my order to arrive?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Once your order is confirmed, it usually takes about 15 days for us to fabricate and install
                            your curtains and blinds.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            What is your returns policy?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            As all our products are custom made-to-measure, we do not accept returns. However, if your
                            order does not meet your expectations, we are committed to working with you to resolve the
                            issue.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Do you ship curtains, blinds, and hardware separately?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            We generally ship your complete order in one go to ensure efficiency and keep our costs in
                            check. This also allows our installation team to complete the job seamlessly. You will
                            receive tracking information for each consignment once it leaves our factory. If you need an
                            update on your order status, feel free to contact us anytime.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFour">
                            What do you charge for delivery?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            At CAB, we believe in sharing is caring. As a gesture of goodwill and as a part of our
                            client-first policy, we cover a significant portion of the shipping cost. We only charge
                            [———] per kg, compared to the regular price of [———]. This is our way of ensuring you get
                            the best value with no hidden delivery fees.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFive">
                            What payment options do you offer?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            We offer a variety of payment options for your convenience, including credit and debit
                            cards, net banking, and UPI. For further details, feel free to discuss the options with our
                            channel partner or contact us directly for any additional information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseSix">
                            Can I track my order progress and delivery?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, you can! We provide real-time updates on the progress of your order. You will receive
                            separate messages with order confirmation and dispatch details, so you can stay informed
                            every step of the way.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse7" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse7">
                            Should the curtains always be lined?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse7" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <p>Yes, lining curtains is essential to ensure proper fall and durability. Lining protects
                                the main fabric from heat and sunlight, preventing fading and extending the life of your
                                curtains. It also enhances light filtration during the day and sharpens the design and
                                colors when viewed from inside. From the outside, lined curtains provide a neat and
                                uniform appearance across multiple windows.
                            </p>
                            <p>However, sheers are an exception—they are never lined, as their purpose is to let light
                                filter through while maintaining privacy.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse8" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse8">
                            What type of lining should I use?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse8" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            We offer two types of lining to suit different needs:
                            <ol>
                                <li><strong>Polyester-Cotton Lining: </strong>This durable, pre-shrunk fabric in an
                                    off-white color is ideal for most curtains. It ensures a proper fall, protects the
                                    main fabric from sunlight, and enhances the overall appearance of the curtains.
                                </li>
                                <li><strong>Dim-Out Lining: </strong>Perfect for bedrooms, home theaters, or spaces
                                    where light control is essential. Our dim-out lining is made of high-grade material,
                                    has an ideal weight, and is easy to maintain, providing excellent light filtration
                                    and privacy.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w1-100 d-flex align-items-center wow animate__animated animate__fadeIn"><a href="/faq" class="primary-btn m-auto mt-4">See All FAQ’s</a></div>
    </div>
</section>

<section class="container wrapper">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">CURTAINS AND BLINDS: Draping Dreams, Unveiling Elegance.</h2>
            <p>Schedule your design consultation today – let’s bring your dreams to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Book Your
            Appointment</a>
    </div>
</section>
@endsection