@extends('pages.layouts.app')
@section('content')


<div id="home" class="main-banner">

    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-box">
                            <a href="{{ route('apply') }}">
                                <i class="icofont-card"></i>
                                <h3>Card Request</h3>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-box">
                            <a href="{{ route('check') }}">
                                <i class="icofont-search-document"></i>
                                <h3>Search Your Card</h3>
                            </a>

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






@endsection


