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
                        <p><a class="btn btn-lg btn-circle btn-brand" href="{{ route('apply') }}">{{ $lan['request_card'] }}</a><a class="btn btn-lg btn-circle btn-outline-new-white" href="#search">{{ $lan['search_card'] }}</a></p>
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
                        <h5 class="text-white">{{ $lan['search_download'] }}</h5>
                        <p class="text-white">{{ $lan['enter_cpr'] }}</p>
                    </div>
                </div>

                <Search placeholder="{{ $lan['enter_cpr_policy'] }}" url="{{ route('cards.online.search') }}"></Search>

            </div>
        </section>



        <section class="module divider-bottom" >

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        @if ($lang == 'en')
                            <a class="btn btn-primary" href="https://samacardbh.net/the-hospital-pdf/">{{ $lan['hospital'] }} %</a>
                        @else
                            <a class="btn btn-primary" href="https://samacardbh.net/%d9%82%d8%a7%d8%a6%d9%85%d8%a9-%d8%a7%d9%84%d9%85%d8%b3%d8%aa%d8%b4%d9%81%d9%8a%d8%a7%d8%aa-pdf/">{{ $lan['hospital'] }}</a>
                        @endif
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
                            <h1>{{ $lan['heading'] }}</h1>
                            <p class="lead">{{ $lan['sub_heading'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <h1 class="mt-4">{{ $lan['benefits'] }}</h1>

                </div>
                <div class="row">
                    <div class="elementor-widget-container">
                        <ul><li><i class="fa fa-arrow-right"></i> {{ $lan['bene_1'] }}</li>
                            <li><i class="fa fa-arrow-right"></i> {{ $lan['bene_2'] }}</li>
                            <li><i class="fa fa-arrow-right"></i> {{ $lan['bene_3'] }}</li>
                            <li><i class="fa fa-arrow-right"></i> {{ $lan['bene_4'] }}</li>
                            <li><i class="fa fa-arrow-right"></i> {{ $lan['bene_5'] }}</li>
                            <li><i class="fa fa-arrow-right"></i> {{ $lan['bene_6'] }}</li>
                        </ul>
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
