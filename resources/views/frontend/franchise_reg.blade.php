@extends('frontend.layouts.app')

@section('title', 'Franchise Registration')
@section('header_img')
<img class="header-img" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="#">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="#" class="active"> Franchise</a>
    </div>
    <h1 class="text-white NewKansas-medium">Become a Partner</h1>
</div>
@endsection
@section('content')
<section class="container wrapper m-100">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h3 class="NewKansas-medium">Become a Franchise and Elevate Your Financial Future</h3>
            <p class="mt-4">Join our network of successful entrepreneurs and maximize your gains with minimal
                investment. Our tailored franchise program offers hassle-free order fulfillment from the back end,
                allowing you to focus on growth.</p>
            <p class="mt-4">We believe in providing full support to our partners, offering comprehensive training from
                your first meeting to the final execution. This ensures a smooth start and consistent profits for you
                and your business.</p>
            <p class="mt-4">
                Whether you’re an individual or have a team, we’ll help you establish the perfect business model with
                scalability and growth potential for the future.
                Once a partner you can be rest assured that we generate enough leads with you and for you both in the
                online and offline mode.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('frontend/images/img-8.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</section>

<section class="cab-usp container bg-dark wrapper" style="border-radius: 30px; padding: 42px;">
    <div class="container">
        <h2 class="NewKansas-medium text-center text-white mb-4">Strong reasons to Join us</h2>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card uspCard bg-white d-flex justify-content-center align-items-center flex-column"
                    style="height: 314px; border-radius: 20px; padding: 30px 24px; text-align: center;">
                    <img src="{{ asset('frontend/images/investment.svg') }}" class="mb-4" alt="">
                    <p class="fs-small">#Reason 1</p>
                    <p>Minimum Investement and maximum returns</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard bg-white d-flex justify-content-center align-items-center flex-column"
                    style="height: 314px; border-radius: 20px; padding: 30px 24px; text-align: center;">
                    <img src="{{ asset('frontend/images/home.svg') }}" class="mb-4" alt="">
                    <p class="fs-small">#Reason 2</p>
                    <p>No overheads of a store or office. Can easily be done from home.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard bg-white d-flex justify-content-center align-items-center flex-column"
                    style="height: 314px; border-radius: 20px; padding: 30px 24px; text-align: center;">
                    <img src="{{ asset('frontend/images/staff.svg') }}" class="mb-4" alt="">
                    <p class="fs-small">#Reason 3</p>
                    <p>No specialised staff is required to close the orders.</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card uspCard bg-white d-flex justify-content-center align-items-center flex-column"
                    style="height: 314px; border-radius: 20px; padding: 30px 24px; text-align: center;">
                    <img src="{{ asset('frontend/images/team.svg') }}" class="mb-4" alt="">
                    <p class="fs-small">#Reason 4</p>
                    <p>Basic team required for Installation and hand overs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container wrapper">
    <div class="registrationSection">
        <h2 class="NewKansas-medium text-center" id="form-title1">Register with us</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('franchise_temp.store') }}" method="POST" class="mt-4" id="franchise_temp" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="pincode" class="form-label">Pincode<span class="requried">*</span></label>
                <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" required min="100000" max="999999">
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
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="India" required readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Name<span class="requried">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="registerationType" class="form-label">Registration Type<span class="requried">*</span></label>
                <select name="registerationType" class="form-control form-select" id="registerationType" required>
                    <option value="">Select Registration Type</option>
                    <option value="Indiviual">Individual</option>
                    <option value="Company">Company</option>
                    <option value="proprietor">Proprietor</option>
                </select>
                <div class="invalid-feedback">Please select a registration type.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name <span class="requried">*</span></label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name">
                <div class="invalid-feedback">Please enter your company name.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="employees" class="form-label">Number of Employees<span class="requried">*</span></label>
                <input type="text" class="form-control" id="employees" name="employees" placeholder="Enter Number of Employees" min="1">
                <div class="invalid-feedback">Please enter a valid number of employees.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email ID<span class="requried">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number<span class="requried">*</span></label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required pattern="^[6-9]\d{9}$">
                <div class="invalid-feedback">Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="alt_mobile" class="form-label">Alternate Number</label>
                <input type="tel" class="form-control" id="alt_mobile" name="alt_mobile" placeholder="Enter Alternate Number" pattern="^[6-9]\d{9}$">
                <div class="invalid-feedback">Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label">Address<span class="requried">*</span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                <div class="invalid-feedback">Please enter your address.</div>
            </div>
        </div>
    </div>
    <button type="submit" class="primary-btn mt-2">Submit</button>
</form>

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
    document.getElementById('franchise_temp').addEventListener('submit', function (event) {
        const form = event.target;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
</script>



        <div id="thankYouMessage1" style=" margin-top: 20px; display: none;">
            <h3 class="NewKansas-medium">Thank you for register with us!</h3>
            <p class="mb-2">We will get back to you shortly.</p>
            <a href="#" id="sendAnother" onclick="resetForm()"
                style="font-family: var(--secondary-font); text-decoration: underline;">Send another
                response</a>
        </div>
    </div>

    <div class="section-contact-info">
        <div class="row">
            <div class="col-md-6">
                <h3 class="NewKansas-medium">Connect with us</h3>
                <p>At Curtain & Blind Co, we understand that when you're choosing, measuring or installing your
                    own curtains and blinds, having access to a real person can make all the difference.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <div class="d-flex flex-column justify-content-end">
                    <a href="tel:+91 987654321" class="NewKansas-medium mb-3 form-bottom-info"
                        style="font-size: 22px;"><img src="{{ asset('frontend/images/call-fill.svg') }}" alt=""> +91
                        7838357850</a>
                    <a href="mailto:support@curtainsandblinds.in" class="NewKansas-medium mb-3 form-bottom-info"
                        style="font-size: 22px;"><img src="{{ asset('frontend/images/mail-fill.svg') }}" alt="">
                        support@curtainsandblinds.in</a>
                    <a href="mailto:info@curtainsandblinds.in" class="NewKansas-medium form-bottom-info"
                        style="font-size: 22px;"><img src="{{ asset('frontend/images/mail-fill.svg') }}" alt="">
                        info@curtainsandblinds.in</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>
    $(document).ready(function () {
        $("#franchise_temp").validate({
            rules: {
                company_name: "required",
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
                pattern: /^[6-9][0-9]{9}$/
            },
            alt_mobile: {
                digits: true,
                minlength: 10,
                maxlength: 10,
                pattern: /^[6-9][0-9]{9}$/
            }
                employees: {
                    required: true,
                    digits: true
                },
                address: "required",
                pincode: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                },
                city: "required",
                state: "required",
                country: "required"
            },
            messages: {
                company_name: "Please enter your company name",
                name: "Please enter your name",
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your mobile number.",
                    digits: "Please enter only numeric digits.",
                    minlength: "Mobile number must be exactly 10 digits.",
                    maxlength: "Mobile number must be exactly 10 digits.",
                    pattern: "Mobile number must start with 6, 7, 8, or 9."
                },
                alt_mobile:{
                    required: "Please enter your mobile number.",
                    digits: "Please enter only numeric digits.",
                    minlength: "Mobile number must be exactly 10 digits.",
                    maxlength: "Mobile number must be exactly 10 digits.",
                    pattern: "Mobile number must start with 6, 7, 8, or 9."
                },
                employees: "Please enter the number of employees",
                address: "Please enter your address",
                pincode: {
                    required: "Please enter your pincode",
                    digits: "Please enter a valid pincode"
                },
                city: "Please enter your city",
                state: "Please enter your state",
                country: "Please enter your country"
            },
            submitHandler: function (form) {
                saveData();
            }
        });
    });
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const registrationType = document.getElementById("registerationType");
        const companyNameField = document.getElementById("company_name").parentElement;
        const employeesField = document.getElementById("employees").parentElement;

        // Initially hide the fields
        companyNameField.style.display = "none";
        employeesField.style.display = "none";

        // Add event listener for change on Registration Type field
        registrationType.addEventListener("change", function () {
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


</script>

@endsection