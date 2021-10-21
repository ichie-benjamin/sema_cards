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
                        {!!  setting('about_heading')  !!}
                    </div>
                    {!! setting('about') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-us-image"> <img src="{{ setting('about_image',asset('frontpage/images/home/slider/slider5.jpg')) }}" alt="Image"> </div>
            </div>

        </div>

        <div class="row align-items-center">
            <div class="col-md-3 col-sm-6 col-xs-6 align-self-end">
                <a href="{{ route('apply') }}">
                    <div class="service-ite " style="background-image: url('/icons/apply.jpeg')">
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 ">
                <a href="{{ route('check') }}">
                    <div class="service-ite" style="background-image: url('/icons/search.jpeg')">
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="{{ route('partner') }}">
                    <div class="service-ite " style="background-image: url('/icons/partner.jpeg')">
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 align-self-start">
                <a  href="{{ route('hospital_listing') }}">
                    <div class="service-ite " style="background-image: url('/icons/hospital.jpeg')">
                    </div>
                </a>
            </div>

        </div>


    </div>
</section>
<section class="add-services">
    <div class="container">
        <div class="section-title text-center">
            <h3> {{ setting('small_heading', 'Quality Services') }}</h3>
            <h2><span>{{ setting('big_heading', 'EXCEPTIONAL SERVICE & CARE') }} </span></h2> </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="add-services-list text-center">
                    <div class="add-number">01.</div>
                    <h3>OUR MISSION</h3>
                    <p>{!! setting('mission') !!}</p>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="add-services-list text-center">
                    <div class="add-number">02.</div>
                    <h3>VISION STATEMENT</h3>
                    <p>{!! setting('vision') !!}</p>
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
        @if (strlen(setting('home_video_link')) > 4)
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <iframe width="1000" height="500" src="{{ setting('home_video_link') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
            @endif
    </div>
</section>



@endsection


