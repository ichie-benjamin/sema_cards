@extends('pages.layouts.app')
@section('content')


    <div id="home" class="main-banner">

        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">

                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-box">
                                <i class="icofont-card"></i>
                                <h3>Card Request</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-box">
                                <i class="icofont-search-document"></i>
                                <h3>Search Your Card</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-box">
                                <a href="{{ route('partner') }}">
                                    <i class="icofont-user"></i>
                                    <h3>Be A Partner</h3>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-box">
                                <i class="icofont-doctor"></i>
                                <h3>Medical Network</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="about" class="why-choose-us ptb-100 bg-f9faff">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="row about-image">
                        <iframe width="480" height="520" src="https://www.youtube.com/embed/ebzbKa32kuk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="section-title">
                        <h3>Why Choose Us</h3>
                        <span>Read About Us</span>
                    </div>
                    <div class="why-choose-us-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                        <ul>
                            <li>We provide high-quality services for the whole family.</li>
                            <li>Risus commodo viverra maecenas</li>
                            <li>Your health is our top priority</li>
                        </ul>
                    </div>
                    <div class="section-title">
                        <h3>Mission / Vision</h3>

                    </div>
                    <div class="why-choose-us-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                        <ul>
                            <li>We provide high-quality services for the whole family.</li>
                            <li>Risus commodo viverra maecenas</li>
                            <li>Your health is our top priority</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="section-title">
                        <h3>Our Card</h3>
                    </div>
                    <div class="why-choose-us-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                        <ul>
                            <li>We provide high-quality services for the whole family.</li>
                            <li>Risus commodo viverra maecenas</li>
                            <li>Your health is our top priority</li>
                        </ul>
                        <a href="#" class="btn">Apply For Card</a>
                    </div>

                </div>
            </div>
        </div>
    </section>






@endsection


