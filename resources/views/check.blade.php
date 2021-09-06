@extends('layouts.frontend')
@section('content')
    <div class="wrapper" id="app">
        <!-- Hero-->
        <section class="module-cover parallax text-center fullscreen" data-background="/images/bg.jpg" data-overlay="0.6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong></strong></h1>
{{--                        <p class="m-b-40">Lucky Card Holder free <br> 6 or 3 months subscription in Sama Card.</p>--}}
                        <p><a class="btn btn-lg btn-circle btn-brand" href="{{ route('apply') }}">Request a card</a><a class="btn btn-lg btn-circle btn-outline-new-white" href="#search">Search card</a></p>
                    </div>
                </div>

            </div>
        </section>
        <!-- Hero end-->

        <!-- About-->
        <section class="module divider-bottom" id="search" style="background-color: #480896">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto ">
                        <h5 class="text-white">Search and download your card.</h5>
                        <p class="lead">Enter your Cpr No to view and download your card</p>
                    </div>
                </div>

                <Search url="{{ route('cards.online.search') }}"></Search>

            </div>
        </section>



        <section class="module divider-bottom" >

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <a class="btn btn-primary" href="https://samacardbh.net/the-hospital-pdf/">Hospital Card %</a>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-6 mx-auto">
                        <img src="/images/ca1.jpeg" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="space" data-mY="30px"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-auto text-center">
                        <div class="text-center">
                            <h1>Sama HealthSaver Card.</h1>
                            <p class="lead">A membership that entitle you to get an immediate discount in all medical services within a wide range of private hospital/clinic who’s contracted with Sama Bahrain Card</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <h1 class="mt-4">Benefit Of Sama Card :</h1>

                </div>
                <div class="row">
                    <div class="elementor-widget-container">
                        <ul><li>Immediate Usage</li>
                            <li>Unlimited Usage</li>
                            <li>Covered chronic Pre-existing Conditions</li>
                            <li>Network Growing</li></ul>
                    </div>
                </div>


            </div>
        </section>
        <!-- About end-->


    <!-- Footer-->
        <footer class="footer">

            <div class="footer-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>For more information please contact us on 77690000 or whatsapp 37749339</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end-->
    </div>
@endsection
