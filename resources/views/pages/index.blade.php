@extends('pages.layouts.app')
@section('content')


<section class="slider">
    <div id="x_023_animated_layers" class="carousel slide x_023_animated_layers_indicators x_023_animated_layers_control_button thumb_scroll_x swipe_x ps_easeOutInCubic" data-ride="carousel" data-pause="hover" data-interval="8000" data-duration="2000">
        <ol class="carousel-indicators">
            <li data-target="#x_023_animated_layers" data-slide-to="0" class="active"></li>
            <li data-target="#x_023_animated_layers" data-slide-to="1"></li>
            <li data-target="#x_023_animated_layers" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="x_023_animated_layers_content">
                    <div class="x_023_animated_layers_txt">
                        <h4 data-animation="animated fadeInLeft">Medial Services that you can trust</h4>
                        <p data-animation="animated fadeInLeft">Need professional help? Our support staff will answer your questions.</p>
                        <p data-animation="animated fadeInLeft">Visit us Now or Make an Appointment! </p>
{{--                        <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a> --}}
                    </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInUp"> <img src="{{ asset('frontpage/images/home/slider/doc-slider2.png') }}" alt="x_023_animated_layers_image_01"> </div>
                </div>
            </div>
            <div class="item">
                <div class="x_023_animated_layers_content x_023_animated_layers_content_right">
                    <div class="x_023_animated_layers_txt">
                        <h4 data-animation="animated fadeInLeft">We make quality health care</h4>
                        <p data-animation="animated fadeInLeft">Passionate About Medicine. Compassionate About People.</p>
                        <p data-animation="animated fadeInLeft">Visit us Now or Make an Appointment! </p>
{{--                        <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a>--}}
                    </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInDown"> <img src="{{ asset('frontpage/images/home/slider/doc-slider1.png') }}" alt="x_023_animated_layers_image_02"> </div>
                </div>
            </div>
            <div class="item">
                <div class="x_023_animated_layers_content x_023_animated_layers_content_right">
                    <div class="x_023_animated_layers_txt">
                        <h4 data-animation="animated fadeInLeft">Modern Technology Treatment</h4>
                        <p data-animation="animated fadeInLeft">Doctor’s for health</p>
                        <p data-animation="animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
{{--                        <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a> --}}
                    </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInDown"> <img src="{{ asset('frontpage/images/home/slider/doc-slider3.png') }}" alt="x_023_animated_layers_image_02"> </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#x_023_animated_layers" role="button" data-slide="prev"> <span class="fa fa-angle-left"></span> </a>
        <a class="right carousel-control" href="#x_023_animated_layers" role="button" data-slide="next"> <span class="fa fa-angle-right"></span> </a>
    </div>
    <div class="overlay"></div>
</section>

<section class="newsletter">
    <div class="container">
        <div class="newsletter-content">
            <div class="subscribe-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <form>
                            <input type="email" placeholder="Search Hospital or Service or place"> <a href="#">Search</a> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services pad-top-0">
    <div class="container">
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/LSR4pyiLfZQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>







@endsection

