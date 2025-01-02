@extends('frontend.layouts.app')

@section('title', 'HOW DO WE WORK')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">How</a>
    </div>
    <h1 class="text-white NewKansas-medium">How do we work</h1>
</div>
@endsection
@section('content')
<section class="request_call wrapper" style="margin-top:142px;">
    <div class="container">
        <div class="row align-items-center">
            <!--<div class="col-md-6 content wow animate__animated animate__fadeIn">-->
            <!--    <h4>Request an in-house consultation with our experts:</h4>-->
            <!--    <p>Simply fill in the request form and let our experts take care of the rest. Get ready for a-->
            <!--        hassle-free experience in window dressing! Don’t forget to check your PIN code to ensure we service-->
            <!--        your area.</p>-->
            <!--</div>-->

            <!--<div class="col-md-6 wow animate__animated animate__fadeIn">-->
            <!--    <div class="request-form p-4">-->
            <!--        <div id="checkzipCode">-->
            <!--            <h4 class="NewKansas-medium text-white mb-3 border-bottom pb-2">Your Info</h4>-->
            <!--            <div class="mb-3">-->
            <!--                <label for="ZipCodeInput" class="form-label text-white">Zip Code*</label>-->
            <!--                <input type="text" class="form-control" id="ZipCodeInput" placeholder="Enter Zip Code"-->
            <!--                    required>-->
            <!--                <label for="error" id="ZipCodeInput-error"-->
            <!--                    class="text-danger p-0 ps-2 pe-2 pt-2 pb-1 m-0 d-none">Please enter a Zip Code.</label>-->
            <!--            </div>-->
            <!--            <button type="submit" class="btn gradient-btn" onclick="toggleSections()">Submit</button>-->
            <!--        </div>-->

            <!--        <div id="redirectMsg" class="d-flex justify-content-center align-items-start flex-column d-none">-->
            <!--            <h4 class="text-white fs-4 NewKansas-medium m-0 mb-2">Awesome! You are in our service area 🎉-->
            <!--            </h4>-->
            <!--            <p class="text-white m-0">Redirecting you to our booking page...</p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <img src="{{ asset('frontend/images/18.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 content wow animate__animated animate__fadeIn">
                <h4>Transform Your Personal Space Effortlessly With Our In-house Consultation Service!</h4>
                <p class="text-justify">By simply filling out our request form, you're one step closer to achieving your transformed home.</p>
                <p class="text-justify">Selecting the perfect color palette and fabric can feel overwhelming and ensuring timely execution adds to the challenge.</p>
                <p class="text-justify">Our experts are here to make the entire process seamless and enjoyable. At Curtains and Blinds, we guide you through every step, from selection to stitching and delivery, with utmost care and precision. Let us bring your dream to life!</p>
            </div>
        </div>
    </div>
</section>

<!-- order-process -->

<div class="wrapper">
    <section class="order-process container wrapper">
        <h2 class="NewKansas-medium text-center">Connect With Us</h2>
        <div class="row mt-4 p-4">
            <div class="col-md-6 wow animate__animated animate__fadeIn">
                <div class="accordion" id="customAccordionExample">
                    <div class="accordion-item custom-accordion-item mb-3 border-0 border-bottom active">
                        <h2 class="accordion-header">
                            <button class="accordion-button custom-accordion-button active-header" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="pointer NewKansas-medium" style="line-height: normal !important;">1</span>
                                Complete the request form. Once we receive your details, our team will contact you to
                                schedule an appointment for a consultant visit.
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#customAccordionExample">
                            <div class="accordion-body">
                                <p>We will send you the visiting person’s details in advance to ensure safety and
                                    security. A nominal non-refundable consultation fee of ₹750 is applicable, which
                                    will be fully adjusted against your order upon placement.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item custom-accordion-item mb-3 border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button custom-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <span class="pointer NewKansas-medium">2</span>Select the perfect material and hardware
                                from the comfort of your home.
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#customAccordionExample">
                            <div class="accordion-body">
                                With the CAB Selection Box delivered right to your doorstep all the other information,
                                you can explore our entire collection at your leisure. Experiment with different
                                combinations until you find your perfect match!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item custom-accordion-item mb-3 border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button custom-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                <span class="pointer NewKansas-medium">3</span>Payment Gateway
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#customAccordionExample">
                            <div class="accordion-body">
                                Complete your purchase effortlessly through our secure and reliable payment gateway.
                                Choose from multiple options, including debit or credit cards from all major banks, UPI,
                                or net banking.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item custom-accordion-item mb-3 border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button custom-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                <span class="pointer NewKansas-medium">4</span>Sit back, relax and enjoy the seamless
                                makeover
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"
                            data-bs-parent="#customAccordionExample">
                            <div class="accordion-body">
                                Let the magic unfold. Enjoy a hassle-free installation on the dates provided, and watch
                                your space transform effortlessly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center wow animate__animated animate__fadeIn">
                <img src="{{ asset('frontend/images/HOW1.png') }}" class="img-fluid accordionSideImage" style="max-width: 100%;" alt="">
            </div>
        </div>
    </section>
</div>

<section class="faq wrapper pt-0">
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
                            issue. For more information, please refer to our full returns and warranty policy on our
                            'Terms & Conditions' page.
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
                            At CAB, we believe sharing is caring. As a gesture of goodwill and a reflection of our client-first policy, we are excited to announce a special promotional offer. For a limited time, enjoy Complimentary Delivery across India with no additional charges.
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
<section class="container wrapper wow animate__animated animate__fadeIn" style="padding-top:0px !important;">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">Transform your space with perfect CURTAINS AND BLINDS!</h2>
            <p>Schedule your design consultation today - let's bring your vision to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Book Your
            Appointment</a>
    </div>
</section>
@endsection