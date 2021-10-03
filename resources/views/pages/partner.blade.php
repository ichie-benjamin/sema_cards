@extends('pages.layouts.app')
@section('content')


    <section class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-outer">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Be A Partner</li>
                    </ul>
                </nav>
                <h2>Become A Parter</h2> </div>
        </div>
    </section>

    <section style="margin-top: 50px;"  class="appointment pad-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h2>Become A  <span>Partner</span></h2> </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="appointment-image"> <img src="{{ asset('frontpage/images/home/appointment.png') }}" alt="image"> </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="appointment-form">
                            <form>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label>Type of Provider</label>
                                        <select>
                                            <option value="">Choose Provider</option>
                                            <option>P2ovider 1</option>
                                            <option>Provider 1</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Name:</label>
                                        <input type="text" placeholder="Sam smiths">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Email:</label>
                                        <input type="email" placeholder="abc@xyz.com">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Phone:</label>
                                        <input type="text" placeholder="+3564676">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Instagram:</label>
                                        <input type="text" placeholder="@username">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Website:</label>
                                        <input type="text" placeholder="www.company.com">
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-btn"> <a class="btn">Submit</a> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection



