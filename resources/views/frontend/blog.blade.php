@extends('frontend.layouts.app')

@section('title', 'Blog')
@section('header_img')
<img class="header-img wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/franchise-bg.jpg') }}"
    style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto wow animate__animated animate__fadeIn">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/blog" class="active">Blogs</a>
    </div>
    <h1 class="text-white NewKansas-medium">Our Blogs</h1>
</div>
@endsection
@section('content')

<section class="container wrapper">
    <div class="topBlogs mt-100">
        <div class="row">
            <div class="verticalBlogCard wow animate__animated animate__fadeIn mb-4">
                <img src="{{ asset('frontend/images/pro-2.png') }}" alt="" class="blogImg">
                <div class="blogInfo shiftRight">
                    <span class="blog-tag">Curtains</span>
                    <h4>Celebrating 30 Years of Design, Innovation & Expertise!</h4>
                    <p>For 30 years, Budget Blinds has been leading the way in the custom window covering industry
                        through Innovation, Motorization, and Customization.</p>
                    <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
            <div class="verticalBlogCard wow animate__animated animate__fadeIn flex-row-reverse mb-4">
                <img src="{{ asset('frontend/images/pro-2.png') }}" alt="" class="blogImg shift-right">
                <div class="blogInfo shiftLeft">
                    <span class="blog-tag">Curtains</span>
                    <h4>Celebrating 30 Years of Design, Innovation & Expertise!</h4>
                    <p>For 30 years, Budget Blinds has been leading the way in the custom window covering industry
                        through Innovation, Motorization, and Customization.</p>
                    <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid wrapper bg-white">
    <h2 class="text-center mb-4">All Blogs</h2>
    <div class="allBlogs container mt-4">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card product-card blogCard wow animate__animated animate__fadeIn">
                    <img src="{{ asset('frontend/images/pro-1.png') }}" alt="">
                    <div class="card-body p-4">
                        <span class="blog-tag">Curtains</span>
                        <h4>How to measure for Blinds</h4>
                        <a href="#" class="readMorebtn">Read More <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container wrapper wow animate__animated animate__fadeIn">
    <div class="CTABanner">
        <div class="w-50">
            <h2 class="NewKansas-medium">Transform your space with perfect curtains & blinds!</h2>
            <p>Schedule your free design consultation today – let’s bring your vision to life!</p>
        </div>
        <a href="/appointments" class="btn primary-btn bg-white" style="color: #000 !important;">Schedule Your
            Appointment</a>
    </div>
</section>
@endsection