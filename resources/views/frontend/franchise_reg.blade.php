@extends('frontend.layouts.app')

@section('title', 'Franchise Registration')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}"
    style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="#">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="#" class="active"> Franchise</a>
    </div>
    <h1 class="text-white NewKansas-medium">Become a Partner</h1>
</div>
@endsection
@section('content')
<section class="container wrapper" style="margin-top:124px;">
    <div class="row align-items-center">
        <div class="col-md-6 wow animate__animated animate__fadeIn">
            <h3 class="NewKansas-medium">Become a Franchise and Elevate Your Financial Future</h3>
            <p class="mt-4 text-justify">Join our thriving network of entrepreneurs and maximize your returns with minimal investment through our tailored franchise program. We take care of hassle-free order fulfillment on the back end, allowing you to focus on driving growth and building your business. From your first meeting to the final execution, we provide comprehensive training and guidance to ensure a smooth launch and consistent profits. Whether you're an individual or part of a team, we work with you to design a scalable business model with robust growth potential for the future. Once you become our partner, you can rest assured that we will help generate quality leads for your business—both online and offline—ensuring maximum reach and profitability.</p>
            <p class="mt-4 text-justify">Our comprehensive training ensures a smooth start and equips you with the tools for long-term success. Whether you’re operating solo or with a team, we’ll help you design a scalable business model that thrives with future growth. As a partner, you’ll benefit from continuous lead generation, both online and offline, driving consistent growth and profitability for your business.</p>
        </div>
        <div class="col-md-6 wow animate__animated animate__fadeIn">
            <img src="{{ asset('frontend/images/img-12.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</section>

<section class="cab-usp container bg-dark wrapper wow animate__animated animate__fadeIn"
    style="border-radius: 30px; padding: 42px; margin-bottom: 80px;">
    <div class="container">
        <h2 class="NewKansas-medium text-center text-white mb-4 wow animate__animated animate__fadeIn">4 Simple steps to
            join us</h2>
        <div class="row">
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard bg-white d-flex justify-content-start align-items-center flex-column"
                    style="height: 293px; border-radius: 20px; text-align: center;">
                    <img src="{{ asset('frontend/images/usp8.png') }}" class="mb-3 img-fluid" alt="">
                    <p>Minimum investment with maximum returns through our program</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard bg-white d-flex justify-content-start align-items-center flex-column"
                    style="height: 293px; border-radius: 20px; text-align: center;">
                    <img src="{{ asset('frontend/images/usp5.png') }}" class="mb-3 img-fluid" alt="">
                    <p>No overheads of a store or office. Can easily be done from home.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard bg-white d-flex justify-content-start align-items-center flex-column"
                    style="height: 293px; border-radius: 20px; text-align: center;">
                    <img src="{{ asset('frontend/images/usp6.png') }}" class="mb-3 img-fluid" alt="">
                    <p>No specialised staff is required to close the orders.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 wow animate__animated animate__fadeIn">
                <div class="card uspCard bg-white d-flex justify-content-start align-items-center flex-column"
                    style="height: 293px; border-radius: 20px; text-align: center;">
                    <img src="{{ asset('frontend/images/usp15.png') }}" class="mb-3 img-fluid" alt="">
                    <p>Basic team required for Installation and hand overs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-white wrapper" id="registerWithUs">
    <div class="registrationSection pt-0 pb-0 container wow animate__animated animate__fadeIn">
        <h2 class="NewKansas-medium text-center" id="form-title1">Register with us</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('franchise_temp.store') }}" method="POST"
            class="mt-4 wow animate__animated animate__fadeIn" id="contact-form1">
            @csrf
            <input type="hidden" name="status" id="status" value="pending">
            <div class="row wow animate__animated animate__fadeIn">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="pincode" class="form-label">Pincode<span class="requried">*</span></label>
                        <!-- <input type="number" class="form-control" id="pincode" name="pincode"
                            placeholder="Enter Pincode" required min="100000" max="999999"> -->
                            <input type="text" class="form-control" id="pincode" name="pincode"
                            placeholder="Enter Pincode" required min="100000" max="999999">
                        <div class="invalid-feedback">Please enter a valid 6-digit pincode.</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="state" class="form-label">State<span class="requried">*</span></label>
                        <select name="state" id="state" class="form-control">
                            <option value="">Select State</option>
                            @foreach ($groupedCityStateData as $state => $cities)
                            <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please enter a valid state name.</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="city" class="form-label">City<span class="requried">*</span></label>
                        <select name="city" id="city" class="form-control">
                            <option value="">Select City</option>
                            <!-- Cities will be populated dynamically based on the selected state -->
                        </select>
                        <div class="invalid-feedback">Please enter a valid city name.</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country<span class="requried">*</span></label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country"
                            value="India" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="requried">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registerationType" class="form-label">Registration Type<span
                                class="requried">*</span></label>
                        <select name="registerationType" class="form-control form-select" id="registerationType"
                            required>
                            <option value="">Select Registration Type</option>
                            <option value="Individual">Individual</option>
                            <option value="Company">Company</option>
                            <option value="proprietor">Proprietor</option>
                        </select>
                        <div class="invalid-feedback">Please select a registration type.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name <span
                                class="requried">*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Enter Company Name">
                        <div class="invalid-feedback">Please enter your company name.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="employees" class="form-label">Number of Employees<span
                                class="requried">*</span></label>
                        <input type="text" class="form-control" id="employees" name="employees"
                            placeholder="Enter Number of Employees" min="1">
                        <div class="invalid-feedback">Please enter a valid number of employees.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ID<span class="requried">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number<span class="requried">*</span></label>
                        <input type="tel" class="form-control" id="mobile" name="mobile"
                            placeholder="Enter Mobile Number" required pattern="^[6-9]\d{9}$" maxlength="10">
                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number starting with 6, 7, 8,
                            or 9.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="alt_mobile" class="form-label">Alternate Number</label>
                        <input type="tel" class="form-control" id="alt_mobile" name="alt_mobile"
                            placeholder="Enter Alternate Number" pattern="^[6-9]\d{9}$" maxlength="10">
                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number starting with 6, 7, 8,
                            or 9.</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address<span class="requried">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address"
                            required>
                        <div class="invalid-feedback">Please enter your address.</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="primary-btn mt-2">Submit</button>
        </form>

        <div id="thankYouMessage1 wow animate__animated animate__fadeIn" style=" margin-top: 20px; display: none;">
            <h3 class="NewKansas-medium">Oops! Seems we are not servicing your area. But wait! we will be coming to you soon</h3>
            <h3 class="NewKansas-medium">Thank you for register with us!</h3>
            <p class="mb-2">We will get back to you shortly.</p>
            <a href="#" id="sendAnother" onclick="resetForm()"
                style="font-family: var(--secondary-font); text-decoration: underline;">Send another
                response</a>
        </div>
    </div>

</section>

<section class="wrapper">
    <div class="container">
        <h3 class="NewKansas-medium text-center mb-4">Training Manual</h3>
        <div class="container">
            <div class="product-collection">
                <ul class="nav nav-pills mb-3 wow animate__animated animate__fadeIn" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active NewKansas-regular" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-curtains"
                            aria-selected="true">Measurements</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link NewKansas-regular" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-curtains"
                            aria-selected="true">Installation</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card product-card bg-white">
                                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                                    <div class="card-body p-4">
                                        <span class="blog-tag">Curtains</span>
                                        <h4>How to measure for Blinds</h4>
                                        <a href="#" class="readMorebtn">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
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

<script>
    document.getElementById('pincode').addEventListener('input', function(event) {
        // Allow only numeric values: Replace anything that's not a digit
        event.target.value = event.target.value.replace(/[^0-9]/g, '');

        if (event.target.value.length > 6) {
            event.target.value = event.target.value.slice(0, 6);
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
        const registrationType = document.getElementById("registerationType");
        const companyNameField = document.getElementById("company_name").parentElement;
        const employeesField = document.getElementById("employees").parentElement;

        // Initially hide the fields
        companyNameField.style.display = "none";
        employeesField.style.display = "none";

        // Add event listener for change on Registration Type field
        registrationType.addEventListener("change", function() {
            const selectedValue = registrationType.value;

            if (selectedValue === "Company" || selectedValue === "proprietor") {
                companyNameField.style.display = "block";
                employeesField.style.display = "block";
            } else {
                companyNameField.style.display = "none";
                employeesField.style.display = "none";
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#company_name').prop('required', false);
        $('#employees').prop('required', false);

        // Monitor the registration type change
        $('#registerationType').on('change', function() {
            var registrationType = $(this).val();

            if (registrationType === "Company" || registrationType === "proprietor") {
                // Make company name and employees fields required if Company or Proprietor is selected
                $('#company_name').prop('required', true);
                $('#employees').prop('required', true);
            } else {
                // Otherwise, remove the required attribute
                $('#company_name').prop('required', false);
                $('#employees').prop('required', false);
            }
        });


        var cityStateData = @json($groupedCityStateData);

        // Handle state change
        $('#state').on('change', function() {
            var selectedState = $(this).val();
            var cities = cityStateData[selectedState] || [];

            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');

            $.each(cities, function(index, city) {
                $('#city').append('<option value="' + city.city_name + '">' + city.city_name + '</option>');
            });
        });
    });

    // Enable client-side validation styles
    document.getElementById('contact-form1').addEventListener('submit', function(event) {
        const form = event.target;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
</script>

@endsection