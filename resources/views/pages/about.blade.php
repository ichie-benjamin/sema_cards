@extends('pages.layouts.app')
@section('content')


<section class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-outer">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active"><a style="color: white"  href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ul>
            </nav>
            <h4>About Us</h4>
        </div>
    </div>
</section>
<section class="about-section pad-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-content">
                    <div class="section-title mar-bottom-15">
                        <h3>About Us</h3>
                        <h2>Short Story About <span>Sema Bahrain</span> Card.</h2> </div>
                    <p>According to studies, our doctors will make an individual program of prevention and treatment of identified diseases, directed to a surgical treatment if necessary.</p>
                    <br>
                    <p>Our Clinic has grown to provide a world class facility for the treatment of tooth loss, dental cosmetics and bore advanced restorative dentistry.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-us-image"> <img src="{{ asset('frontpage/images/home/slider/slider5.jpg') }}" alt="Image"> </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="service-item">
                    <div class="service-icon mar-bottom-20"><i class="flaticon-023-otoscope"></i> </div>
                    <div class="service-content">
                        <h3><a href="department-detail.html">Card Request</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="add-services">
    <div class="container">
        <div class="section-title text-center">
            <h3>Quality Services</h3>
            <h2><span>Exceptional</span> Service & Care</h2> </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="add-services-list text-center">
                    <div class="add-number">01.</div>
                    <h3>OUR MISSION</h3>
                    <p>When you sit down with one of our pharmacists, you receive one hour of his/her attention. Our pharmacist will listen to your concerns. </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="add-services-list text-center">
                    <div class="add-number">02.</div>
                    <h3>VISION STATEMENT</h3>
                    <p>Our patients receive personalized care that is affordable and attentive, with many of them being with us since opening day in 1996.</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="add-services-list text-center">
                    <div class="add-number">03.</div>
                    <h3>Events</h3>
                    <p>When you sit down with one of our pharmacists, you receive one hour of his/her attention. Our pharmacist will listen to your concerns. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h3>Video</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <iframe width="1000" height="500" src="https://www.youtube.com/embed/LSR4pyiLfZQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>



@endsection


