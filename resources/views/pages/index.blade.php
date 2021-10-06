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
                        <h1 data-animation="animated fadeInLeft">Medial Services that you can trust</h1>
                        <p data-animation="animated fadeInLeft">Need professional help? Our support staff will answer your questions.</p>
                        <p data-animation="animated fadeInLeft">Visit us Now or Make an Appointment! </p> <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a> </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInUp"> <img src="{{ asset('frontpage/images/home/slider/doc-slider2.png') }}" alt="x_023_animated_layers_image_01"> </div>
                </div>
            </div>
            <div class="item">
                <div class="x_023_animated_layers_content x_023_animated_layers_content_right">
                    <div class="x_023_animated_layers_txt">
                        <h1 data-animation="animated fadeInLeft">We make quality health care</h1>
                        <p data-animation="animated fadeInLeft">Passionate About Medicine. Compassionate About People.</p>
                        <p data-animation="animated fadeInLeft">Visit us Now or Make an Appointment! </p> <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a> </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInDown"> <img src="{{ asset('frontpage/images/home/slider/doc-slider1.png') }}" alt="x_023_animated_layers_image_02"> </div>
                </div>
            </div>
            <div class="item">
                <div class="x_023_animated_layers_content x_023_animated_layers_content_right">
                    <div class="x_023_animated_layers_txt">
                        <h1 data-animation="animated fadeInLeft">Modern Technology Treatment</h1>
                        <p data-animation="animated fadeInLeft">Doctor’s for health</p>
                        <p data-animation="animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p> <a href="#" data-animation="animated fadeInRight" class="btn mar-top-15">Make An Appointment</a> </div>
                    <div class="x_023_animated_layers_img" data-animation="animated fadeInDown"> <img src="{{ asset('frontpage/images/home/slider/doc-slider3.png') }}" alt="x_023_animated_layers_image_02"> </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#x_023_animated_layers" role="button" data-slide="prev"> <span class="fa fa-angle-left"></span> </a>
        <a class="right carousel-control" href="#x_023_animated_layers" role="button" data-slide="next"> <span class="fa fa-angle-right"></span> </a>
    </div>
    <div class="overlay"></div>
</section>

<br>
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
<br>


<section class="services pad-top-0 icon-left">
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-xs-12">--}}
{{--                <div class="section-title">--}}
{{--                    <h3>WE OFFER SERVICES</h3>--}}
{{--                    <h2> <span class="text text-center">Explore</span> </h2> </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="service-item">
                    <div class="service-icon mar-bottom-20"><i class="flaticon-023-otoscope"></i> </div>
                    <div class="service-content">
                        <h3><a href="{{ route('apply') }}">Card Request</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="service-item">
                    <div class="service-icon mar-bottom-20 child-2"> <i class="flaticon-020-examine"></i> </div>
                    <div class="service-content">
                        <h3><a href="{{ route('check') }}">Search Your Card</a></h3>
{{--                        <p>The hospital plays a statewide role in rehabilitation services, which includes the Acquired</p>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="service-item">
                    <div class="service-icon mar-bottom-20 child-3"> <i class="flaticon-003-blood-sample"></i> </div>
                    <div class="service-content">
                        <h3><a href="{{ route('partner') }}">Be A Partner</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="service-item">
                    <div class="service-icon mar-bottom-20 child-2"> <i class="flaticon-025-serum"></i> </div>
                    <div class="service-content">
                        <h3><a target="_blank" href="{{ setting('network_en') }}">Medical Network</a></h3>

                    </div>
                </div>
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

