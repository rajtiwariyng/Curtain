@extends('frontend.layouts.app')

@section('title', 'FAQ')
@section('header_img')
<img class="header-img" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/faq" class="active">FQA</a>
    </div>
    <h1 class="text-white NewKansas-medium">Frequently Asked Questions</h1>
</div>
@endsection
@section('content')
<section class="container wrapper m-100">
    <div class="faqSection">
        <select class="form-select faq-select-mob" aria-label="Default select example">
            <option selected>Payment & Delivery</option>
            <option value="Curtains">Curtains</option>
            <option value="Roman Blinds">Roman Blinds</option>
            <option value="Roller Blinds">Roller Blinds</option>
            <option value="Hardware">Hardware</option>
            <option value="Measurements & Installation">Measurements & Installation</option>
        </select>
        <div class="faqSection-header d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active faq-btn" id="v-pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">Payment & Delivery</button>
                <button class="nav-link faq-btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false">Curtains</button>
                <button class="nav-link faq-btn" id="v-pills-messages-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">Roman Blinds</button>
                <button class="nav-link faq-btn" id="v-pills-settings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">Roller Blinds</button>
                <button class="nav-link faq-btn" id="v-pills-hardware-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-hardware" type="button" role="tab" aria-controls="v-pills-hardware"
                    aria-selected="false">Hardware</button>
                <button class="nav-link faq-btn" id="v-pills-measurements-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-measurements" type="button" role="tab" aria-controls="v-pills-measurements"
                    aria-selected="false">Measurements &
                    Installation</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab" tabindex="0">
                    <div class="w-100">
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
                                        Typically, from the date of order confirmation we need 15 days to
                                        fabricate and install your curtains and blinds.
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
                                        Since all our products are custom made-to-measure, we do not accept
                                        returns. However, if for any reason your order does not meet your
                                        expectations, we will work with you to resolve the issue. For more
                                        details, please refer to our full returns and warranty policy on our
                                        'Terms & Conditions' page.
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
                                        Ideally, we ship your complete order in one go. This helps us in keeping
                                        our costings in check and helps our installation team to complete the
                                        job in a more efficient manner. You will receive tracking information
                                        for each consignment as soon as it leaves our factory. As always, feel
                                        free to contact us if you’d like an update on your order delivery
                                        status.
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
                                        We believe in sharing is caring. As a gesture of goodwill and our client
                                        first policy we have shared the cost of shipping and charge only ————
                                        per kg against ———— as regular price
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
                                        Payments can be done through a number of existing payment gateways using
                                        credit or debit cards, net banking or UPI options.
                                        Please discuss this in detail with our channel partner or contact us for
                                        any other information.
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
                                        Yes, you can. You will be receiving real time information about the
                                        progress of your order. Saperate messages will be sent about order
                                        confirmation and dispatch details.
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
                                        Yes. It is very important to line the main curtains to ensure proper
                                        fall and life
                                        of the curtains. Lining a curtain saves the main fabric from heat and
                                        sun protecting
                                        it from fading. Also it helps the filtration of light during the day
                                        time. The
                                        designs are better formed and the colours are sharper from the inside.
                                        From the
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
                                        polyester- cotton lining : A fine quality durable preshrunk fabric in
                                        off white
                                        colour that ensures proper fall and protection to the main curtain.
                                        Dim out curtains: To be used in bed rooms , home theater or any other
                                        such areas
                                        where the outside light filteration needs to be controlled. Our dim out
                                        lining is
                                        easily maintainable and of high grade and the ideal weight.

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">
                    <div class="w-100">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Should the curtains always be lined?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        Yes. It is very important to line the main curtains to ensure proper
                                        fall and life of the curtains. Lining a curtain saves the main fabric
                                        from heat and sun protecting it from fading. Also it helps the
                                        filtration of light during the day time. The designs are better formed
                                        and the colours are sharper from the inside. From the outside the look
                                        from the multiple room windows is uniformed and neat
                                        Sheers are never to be lined.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        What is the type of lining that I should use?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        There are 2 types of lining that we offer.
                                        polyester- cotton lining : A fine quality durable preshrunk fabric in
                                        off white colour that ensures proper fall and protection to the main
                                        curtain.
                                        Dim out curtains: To be used in bed rooms , home theater or any other
                                        such areas where the outside light filteration needs to be controlled.
                                        Our dim out lining is easily maintainable and of high grade and the
                                        ideal weight.

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        How do I clean my sheer curtains?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Although most of our fabrics are cold water washable we strongly
                                        recommend dry cleaning of the curtains. This will ensure the freshness
                                        and the newness of the fabrics for longer time.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapse4">
                                        What curtain heading styles are available?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        We offer 2 types of elegant and evergreen curtain styles.
                                        A standard 3 pleat pinch pleats where channel tracks are used.
                                        For areas where rods are being used you need to choose the eyelet
                                        curtains.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                    tabindex="0">
                    <div class="w-100">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Are Roman blinds good for blackout?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        Our blackout Roman blinds are an ideal solution for creating a dim out
                                        effect in your room. When fully extended, the blackout fabric completely
                                        covers the window, significantly darkening the interior with only a
                                        small amount of light seeping in around the fabric edges. These blinds
                                        are perfect for bedrooms and home theatre , or any space where light
                                        control is a priority.
                                        they are very effective for commercial spaces as well.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        What customization and value addition can be done on the roman blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Our Roman blinds are available in a variety of colors and offer the dim
                                        out option as well.
                                        You can also select value additions as borders and embroideries to
                                        enhance the look of your interiors.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        How do i care for my roman blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        If you spill or stain your Roman blinds, promptly spot clean the
                                        affected area using a clean cloth and mild detergent mixed with warm
                                        water.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
                    tabindex="0">
                    <div class="w-100">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        How many options are available under the roller blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        currently, we have three types of options in the roller blind category
                                        1. Blackout roller blind
                                        2. Zebra roller blind
                                        3. Sheer roller blind

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        What are the key benefits of BLACKOUT roller blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Blackout roller blinds are highly effective at minimizing light
                                        penetration, offering a cost-efficient way to darken rooms, regulate
                                        temperature, and enhance privacy. Their straightforward chain control
                                        mechanism makes them easy to install and operate, delivering a quick and
                                        convenient solution.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        What are the best areas to install roller blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Roller blinds are a versatile choice for various rooms or spaces in the
                                        home or office. They are easy to install, operate, and maintain, while
                                        their durability and ability to regulate light and temperature make them
                                        an excellent all-around solution!
                                        roller blinds can be installed in any window. We can install them over
                                        the windows or inside the window sill. This would depend on the type of
                                        material used for the window frame. Also are we using stone or marble in
                                        the window frame?
                                        Roller blinds are very effective in the wet areas as well.
                                        Both zebra and black out blinds look very good in the commercial spaces
                                        as well
                                        Sheer roller blinds are used when we want to Diffuse the light
                                        filtration in the Windows. They had an aesthetic quality to the
                                        interior. We can always add a main curtain on top of sheer blinds to
                                        complete the Window dress.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        How do I clean my blackout roller blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        If you spill or stain your roller blinds, it’s important to clean the
                                        affected area promptly. Gently spot clean using a clean cloth, warm
                                        water, and a mild detergent. Dab the spot rather than rubbing it. Avoid
                                        using abrasive pads or harsh chemicals on the fabric, and let the blind
                                        air-dry completely. For maintenance, we recommend light dusting
                                        regularly to prevent the accumulation of dust and dirt.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        How do I cover a wide window or sliding doors with blinds?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        If you're installing blinds side-by-side, you have two operation
                                        options: dependent or independent. Dependent operation means all blinds
                                        move together using a single chain. Independent operation allows each
                                        blind to move separately with its own chain, which is useful if there's
                                        an opening at one end of the window. However, the gaps between the
                                        blinds will be slightly wider to accommodate the chain mechanisms.
                                        When placing your order for side-by-side blinds, please specify whether
                                        you'd like dependent or independent operation in the order notes.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-hardware" role="tabpanel" aria-labelledby="v-pills-hardware-tab"
                    tabindex="0">
                    <div class="w-100">
                        <p style="padding: 12px; background-color: var(--white-color); border-radius: 8px;">
                            Selecting the right drapery hardware is just as crucial as choosing your curtains
                            and blinds. We provide ideal solutions for both exposed decorative channels and
                            rods, as
                            well as hidden channels in coves. Each hardware option is thoughtfully curated to
                            balance aesthetics with functionality. We've prioritized durable solutions that
                            account for the weight and movement of the curtains, ensuring lasting performance.
                        </p>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        What are the various options of channels and rods we have?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        1. Chanels for curtains and sheers <br>
                                        2. Blind channels for roman blinds <br>
                                        3. Decorative rods with matching fenials for exposed hardware

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Can we motorise our blinds if we do not have an electrical connection?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Yes we have a solution where we provide long lasting chargeable
                                        motorised curtains and blind solutions where the electrical points are
                                        not provided.
                                        In How many days do we have to recharge our motor batteries?
                                        The included lithium-ion battery recharge frequency will vary based on
                                        blind size and frequency of use. However, generally speaking, we would
                                        expect at least 3 and up to 6 months between charges.

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-measurements" role="tabpanel"
                    aria-labelledby="v-pills-measurements-tab" tabindex="0">
                    <div class="w-100">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Can we do remote measurements?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        Strongly recommend that the measurements and installation should be done
                                        by our expert and trained partners. But if the area is unreachable by
                                        them, then you can take your own measurements and provide them. we will
                                        ensure that the final product is as per the specs
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        How much time do we need to take the measurements and close the order?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Time taken for measurements will depend on the number of rooms and
                                        Windows that have to be addressed. Typically, we close an order within a
                                        couple of hours.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        How much time do we take to install the hardware and curtains?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        We need approximately half an hour to 45 minutes to install the hardware
                                        and curtain of double channel, main and sheer curtain.
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
<section class="container wrapper" style="padding-top:0px;">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">Transform your space with perfect CURTAINS AND BLINDS!</h2>
            <p>Schedule your design consultation today – let’s bring your vision to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Schedule Your
            Appointment</a>
    </div>
</section>
@endsection