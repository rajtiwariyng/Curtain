@extends('frontend.layouts.app')

@section('title', 'Schedule an appointment')
@section('header_img')
<img class="header-img" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">Schedule Appointment</a>
    </div>
    <h1 class="text-white NewKansas-medium text-center">Schedule an appointment</h1>
</div>
@endsection
@section('content')
<section class="container wrapper" style="margin-top:124px;">
    <div class="registrationSection">
        <div class="row" id="form-title">
            <div class="col-md-4">
                <h2 class="NewKansas-medium">Get in touch</h2>
                <p>Add your area pincode to check availability</p>
            </div>
            <div class="col-md-8">
                <div class="mb-3 checkPincode" id="check_pincode">
                    <label for="PincodeInput" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="PincodeInput" placeholder="Enter Pincode">

                </div>
            </div>
        </div>
        <!-- Form -->

        <form action="javascript:" class="mt-4 border-top pt-4" id="contact-form1">
            <p>Fill this form to schedule an appointment</p>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ID</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                    </div>
                </div>
            </div>
            <button type="submit" class="primary-btn mt-2">Submit</button> 
        </form>

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
<script>
    document.getElementById('PincodeInput').addEventListener('input', function(event) {
        // Allow only numeric values: Replace anything that's not a digit
        event.target.value = event.target.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('mobile').addEventListener('input', function (event) {
    const errorMsg = document.getElementById('mobile-error'); // Reference to the error message element
    let input = event.target.value;

    // Allow only digits
    input = input.replace(/[^0-9]/g, '');

    // Limit to 10 digits
    if (input.length > 10) {
        input = input.slice(0, 10);
    }

    // Check if the number starts with 6, 7, 8, or 9
    if (input.length > 0 && !/^[6-9]/.test(input)) {
        errorMsg.textContent = "Mobile number must start with 6, 7, 8, or 9.";
        errorMsg.style.display = "block";
    } else {
        errorMsg.style.display = "none"; // Hide error message if valid
    }

    // Set the sanitized value back to the input
    event.target.value = input;
});


    $(document).ready(function() {
        $("#contact-form1").validate({
            rules: {
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
                name: "Please enter your name",
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your mobile number",
                    digits: "Please enter a valid mobile number",
                },
                address: "Please enter your address",
                pincode: {
                    required: "Please enter your pincode",
                    digits: "Please enter a valid 6-digit pincode"
                },
                city: "Please enter your city",
                state: "Please enter your state",
                country: "Please enter your country"
            },
            submitHandler: function(form) {
                saveData();
            }
        });
    });
    
    function saveData() {
        const formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val(),
            address: $("#address").val(),
            pincode: $("#PincodeInput").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            country: $("#country").val(),
            _token: $("input[name='_token']").val() // CSRF token
        };
    
        $.ajax({
            type: "POST",
            url: "{{ route('appointments.store') }}",
            data: formData,
            success: function(response) {
                $("#contact-form1").hide(); // Hide form
                $("#thankYouMessage1").show(); // Show thank you message
                $("#contact-form1")[0].reset(); // Reset form
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + error);
            }
        });
    }
    </script> 
    <script>
    $(document).ready(function() {
        $("#contact-form1 input, #contact-form1 button").prop("disabled", true);
        $('#PincodeInput').on('change', function() {
            var pincode = $(this).val();
            if (pincode) {
                $.ajax({
                    url: '/get-location',
                    method: 'POST',
                    data: {
                        pincode: pincode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.pin-msg').empty();

                        $('#country').val('');
                        $('#state').val('');
                        $('#city').val('');
                        // $('#pincode').val('');

                        if(response.status === 'true'){
                            $('#check_pincode').append(`<div id="pinAvailable" class="available-text pin-msg"><i class="bi bi-check-circle-fill"></i> We're available here.</div>`);

                            $('#country').val(response.location_data.country);
                            $('#state').val(response.location_data.state);
                            $('#city').val(response.location_data.city);
                            $('#pincode').val(response.location_data.zip_code);


                            // input box enable functionality
                            var isDisabled = $("#contact-form1 input, #contact-form1 button").first().prop("disabled");

                            if (isDisabled) {
                                // If the form is disabled, enable it
                               $("#contact-form1 input, #contact-form1 button").not('#country, #state, #city').prop("disabled", false);
                                 $(this).text('Disable Form');
                            } else {
                               
                                // If the form is enabled, disable it
                                $("#contact-form1 input, #contact-form1 button").not('#country, #state, #city').prop("disabled", true);
                                $(this).text('Enable Form');
                            }
                        }
                        if(response.status === 'false'){
                            $("#contact-form1 input, #contact-form1 button").prop("disabled", true);
                            $('#check_pincode').append(`<div id="pinNotAvailable" class="available-text text-danger pin-msg"><i class="bi bi-x-circle-fill"></i></i> Not available here.</div>`);
                        }
                        
                    }
                });
            }
        });

        $('#pincode').on('blur', function() {
            var pincode = $(this).val();
            if (pincode) {
                $.ajax({
                    url: '/get-location',
                    method: 'POST',
                    data: {
                        pincode: pincode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#country').val(response.country);
                        $('#state').val(response.state);
                        $('#city').val(response.city);
                    },
                    error: function() {
                        alert('Location not found!');
                    }
                });
            }
        });
    });
</script>
@endsection