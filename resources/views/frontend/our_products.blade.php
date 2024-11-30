@extends('frontend.layouts.app')

@section('title', 'Our Products')
@section('header_img')
<img class="header-img" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">Products</a>
    </div>
    <h1 class="text-white NewKansas-medium">Our Products</h1>
</div>
@endsection
@section('content')
<section class="container-fluid wrapper main" style="margin-top:142px;">
    <div class="container">
        <h2 class="NewKansas-medium">Bespoke Window Furnishings in the comfort of your home</h2>
        <h4 class="mt-3 mb-4">With over 40 years of industry expertise, we specialize in creating custom window
            furnishings that meet the highest standards.</h4>
        <div class="row mt-4">
            <div class="col-md-6">
                <img src="{{ asset('frontend/images/img-9.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <p>With over 30 years of expertise in the industry, we specialize in crafting custom window furnishings
                    that adhere to the highest standards. Enjoy the convenience of bespoke soft furnishings from the
                    comfort of your home, with smooth delivery facilitated by our advanced production and fulfillment
                    teams. Explore our carefully curated collections, designed by skilled textile designers, and
                    complement your furnishings with matching hardware and accessories for a seamless, hassle-free
                    experience.</p>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="NewKansas-regular">Hospitality and commercial furnishing solutions</h2>
            <p>Gone are the days of dull office spaces. Our stunning commercial furnishing solutions are designed to
                transform and breathe new life into your workplaces creating a dynamic, inspiring and a vibrant
                environment that inspires productivity.</p>
            <p>With extensive experience collaborating with renowned hospitality chains such as Taj, Meridian, and
                Pullman, we offer comprehensive curtain solutions for all types of hospitality projects.</p>
            <p>Understanding the unique needs of the hospitality industry, we provide specialized materials such as
                blackouts, dim-outs, and fire-resistant fabrics, ensuring every requirement is met with precision and
                quality.</p>
        </div>
        <div class="col-md-6">
            <img src="images/img-8.png" class="img-fluid" alt="">
        </div>
    </div>
</section>

<section class="container wrapper">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="NewKansas-medium">Trendy designs</h2>
            <h1 style="color: #8E2D1F;" class="mb-4">@ Genuine pricing</h1>

            <p>Less is more. Why settle for the ordinary? Today’s design language embraces minimalism and a
                clutter-free aesthetic, yet remains trendy and interesting. At CAB, we ensure that these
                principles are brought to life in every design.</p>
        </div>

        <div class="col-md-6">
            <img src="images/image.png" class="img-fluid" alt="">
        </div>
    </div>
</section>



<!-- FAQ -->

<section class="faq" style="margin-bottom:64px;">
    <div class="container">
        <h2 class="NewKansas-medium text-center mb-4">CAB FAQ</h2>
        <p class="text-center">Frequently Asked Questions</p>
        <div class="w-75 m-auto">
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
                            Typically from the date of order confirmation we need 15 days to fabricate and
                            install your curtains and blinds.
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
                            Since all our products are custom made-to-measure, we do not accept returns.
                            However, if for any reason your order does not meet your expectations, we will work
                            with you to resolve the issue. For more details, please refer to our full returns
                            and warranty policy on our 'Terms & Conditions' page.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Do you ship curtains and blinds and hardware separately?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Ideally we ship your complete order in one go. This helps us in keeping our costings
                            in check and helps our installation team to complete the job in a more efficient
                            manner. You will receive tracking information for each consignment as soon as it
                            leaves our factory. As always, feel free to contact us if you’d like an update on
                            your order delivery status.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse4">
                            What do you charge for delivery?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            We believe in sharing is caring. As a gesture of goodwill and our client first policy we
                            have shared the cost of shipping and charge only Rs 50 per kg.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse5" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse5">
                            What payment options do you offer?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Payments can be done through a number of existing payment gateways using credit or
                            debit cards, net banking or UPI options.
                            Please discuss this in detail with our channel partner or contact us for any other
                            information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse6" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse6">
                            Can I track my order progress and delivery?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse6" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, you can. You will be receiving real time information about the progress of your
                            order. Saperate messages will be sent about order confirmation and dispatch details.
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
                            Yes. It is very important to line the main curtains to ensure proper fall and life
                            of the curtains. Lining a curtain saves the main fabric from heat and sun protecting
                            it from fading. Also it helps the filtration of light during the day time. The
                            designs are better formed and the colours are sharper from the inside. From the
                            outside the look from the multiple room windows is uniformed and neat
                            Sheers are never to be lined.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse8" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse8">
                            What is the type of lining that I should use?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse8" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            There are 2 types of lining that we offer.
                            polyester- cotton lining : A fine quality durable preshrunk fabric in off white
                            colour that ensures proper fall and protection to the main curtain.
                            Dim out curtains: To be used in bed rooms , home theater or any other such areas
                            where the outside light filteration needs to be controlled. Our dim out lining is
                            easily maintainable and of high grade and the ideal weight.

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><button class="primary-btn mt-3">See All FAQ’s</button></div>
    </div>
</section>

@endsection