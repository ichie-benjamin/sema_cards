@extends('pages.layouts.app')
@section('content')

<section class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-outer">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ul>
            </nav>
            <h2>Contact Us</h2> </div>
    </div>
</section>
<section class="contact pad-bottom-0">
    <div class="container">
        <div class="map">
            <div id="map"></div>
        </div>
        <div class="contact-inner">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="contact-detail">
                        <h2 class="white">Do You want to Reach at the next Level of business Success?</h2>
                        <p class="white mar-bottom-40">Book a Complimentary Appointment by Visiting or calling Us!</p>
                        <div class="contact-list">
                            <p class="contact mar-bottom-10 white"><i class="fa fa-phone" aria-hidden="true"></i> 123-456-79459</p>
                            <p class="contact mar-bottom-10 white"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d2bbbcb4bd92a1a5b3a1a6baabb3fcb1bdbf">[email&#160;protected]</a></p>
                            <p class="contact white"><i class="fa fa-map-marker" aria-hidden="true"></i> 323 Wintergreen Dr.Englewood, NJ 07631</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <form>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>Name:</label>
                                <input type="text" placeholder="Sam smiths"> </div>
                            <div class="form-group col-xs-6">
                                <label>Email:</label>
                                <input type="text" placeholder="abc@xyz.com">
                            </div>

                            <div class="form-group col-xs-12">
                                <label>Your Message</label>
                                <textarea>Enter your message here</textarea>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-btn"> <a class="btn"> Send Message</a> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('frontpage/js/custom-map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4JwWo5VPt9WyNp3Ne2uc2FMGEePHpqJ8&amp;callback=initMap" async defer></script>

@endsection


