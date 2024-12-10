@extends('frontend.layouts.app')

@section('title', 'Contact Us')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/appointments" class="active">Contact</a>
    </div>
    <h1 class="text-white NewKansas-medium">Contact Us</h1>
</div>
@endsection
@section('content')

<section class="container wrapper">
    <div class="contact">
        <div class="row">
            <div class="col-md-5 contact-info wow animate__animated animate__fadeIn">
                <div class="contact-title">
                    <h3 class="NewKansas-medium text-white mb-1">Contact Information</h3>
                    <p class="text-white">Feel free to connect with us.</p>
                </div>
                <div class="d-flex flex-column justify-content-end">
                    <a class="p-2 d-flex align-items-center text-white" href="https://wa.link/7m1rva"><img class="me-2"
                            src="{{ asset('frontend/images/whatsapp-w.svg') }}" alt="">+91 7838357850</a>
                    <a class="p-2 d-flex align-items-center text-white" href="mailto:support@curtainsandblinds.in"><img
                            class="me-2" src="{{ asset('frontend/images/support-w.svg') }}"
                            alt="">support@curtainsandblinds.in</a>
                    <a class="p-2 d-flex align-items-center text-white" href="mailto:info@curtainsandblinds.in"><img
                            class="me-2" src="{{ asset('frontend/images/mail-w.svg') }}"
                            alt="">info@curtainsandblinds.in</a>
                </div>
                <div class="social-link mt-4">
                    <a href="#" class="pe-3"><img src="{{ asset('frontend/images/facebook-w.svg') }}" alt=""></a>
                    <a href="#" class="pe-3"><img src="{{ asset('frontend/images/instagram-w.svg') }}" alt=""></a>
                    <a href="#" class="pe-3"><img src="{{ asset('frontend/images/linkedin-w.svg') }}" alt=""></a>
                    <a href="#" class="pe-3"><img src="{{ asset('frontend/images/twitter-w.svg') }}" alt=""></a>
                </div>
            </div>

            <div class="col-md-7 wow animate__animated animate__fadeIn">
                <form action="#" class="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="NameInput" class="form-label">Name <span class="requried">*</span></label>
                                <input type="text" class="form-control" id="NameInput" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="EmailInput" class="form-label">Email<span class="requried">*</span></label>
                                <input type="email" class="form-control" id="EmailInput" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="PhoneInput" class="form-label">Phone No <span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control" id="PhoneInput"
                                    placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="EnquiryInput" class="form-label">Enquiry Type<span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control" id="EnquiryInput" placeholder="Enter Enquiry">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="QueryInput" class="form-label">Your Query</label>
                                <textarea name="message" class="form-control" id="userMessage"
                                    placeholder="Enter Your Query" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="primary-btn mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="container wrapper wow animate__animated animate__fadeIn" style="padding-top:0px !important;">
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