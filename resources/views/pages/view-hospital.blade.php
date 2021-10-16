@extends('pages.layouts.app')
@section('content')


    <section class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-outer">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Hospital page</li>
                    </ul>
                </nav>
                <h4>{{ $hospital->provider_name }}</h4>
            </div>
        </div>
    </section>

    <section class="doctor-detail">
        <div class="container">
            <div class="doctor-title">
                <div class="doctor-image">
                    <img src="{{ $hospital->image }}" alt="Image">
                </div>
                <div class="doctor-title-content">
                    <div class="dt-outer">
                        <h2>{{ $hospital->provider_name }} Info</h2>
                        <ul>
                            <li><strong>Provider name :</strong> {{ $hospital->provider_name }}</li>
                            <li><strong>Phone :</strong> {{ $hospital->contact }} {{ $hospital->contact2 ? ' - ' .$hospital->contact2 : '' }}</li>
                            <li><strong>E-mail:</strong> {{ $hospital->email }}</li>
                            <li><strong>Address :</strong> {{ $hospital->address }}</li>
                            <li><strong>Website :</strong> {{ $hospital->website }}</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="doctor-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-outer">
                            <div class="intro content-item">
                                <div class="content-title">
                                    <h3>Description</h3>
                                    <span></span>
                                </div>
                                <p>{{ $hospital->description }}</p>
                            </div>
                            <div class="qualification content-item">
                                <div class="content-title">
                                    <h3>The Discount rate For Sama HealthSaver Card Holders :</h3>
                                    <span></span>
                                </div>
                                <div class="qf-table">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>S.N</td>
                                            <td>Service</td>
                                            <td>Price</td>
                                            <td>Discount</td>
                                            <td>Before Discount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($services as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>BD{{ $item->price }}</td>
                                                <td>{{ $item->discount }}%</td>
                                                <td>BD{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="skills content-item">
                                <div class="content-title">
                                    <h3>Specialty</h3>
                                    <span></span>
                                </div>
                                <div class="progress-outer">
                                    <div class="progress-item">
                                        <h4>Dentist</h4>
                                        <div class="progress">
                                            <div class="progress-bar color2" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span>100%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <h4>Cosmetics</h4>
                                        <div class="progress">
                                            <div class="progress-bar color3" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <span>100%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="experience content-item">
                                <div class="content-title">
                                    <h3>Doctors</h3>
                                    <span></span>
                                </div>
                                <ul>
                                    <li>Dr. Kal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
{{--                    @section('hide')--}}
                    @if(count($contacts) > 0)
                    <div class="col-md-4">
                        <div class="detail-sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-title">
                                    <h3>Fix Appointment</h3>
                                </div>
                                @foreach($contacts as $item)
                                <form>
                                    <div class="form-group">
                                        <label>Name: {{ $item->name}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Position: {{ $item->position}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Email: {{ $item->email}}</label>
                                    </div>
                                 <div class="form-group">
                                        <label>Mobile: {{ $item->mobile}}</label>
                                    </div>

                                </form>
                                @endforeach
                            </div>
                            <div class="sidebar-ad">
                                <div class="ad-content">
                                    <p>We are available 24/7</p>
                                    <h3>Medical and Health consultant at your service</h3>
                                    <a class="btn"> Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
{{--                    @endsection--}}
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="subscribe-form">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3 class="white">Subscribe to newsletter</h3>
                            <p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur exercitationem repellendus.</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <form>
                                <input type="email" placeholder="abc@xyz.com">
                                <a href="#">Subscribe</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
