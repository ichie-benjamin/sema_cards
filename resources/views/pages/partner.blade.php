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
                                <i class="icofont-user"></i>
                                <h3>Be A Partner</h3>
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



    <section id="contact" class="contact-area ">
        <div class="container">
            <h2 class="mb-4 mt-4">Be A Partner</h2>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form id="contactForm" novalidate="true">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
{{--                                    <label>Provider Type</label>--}}
                                    <select class="form-control" name="provider_type" id="">
                                        <option value="">Choose Provider Type</option>
                                        <option value="">provider1</option>
                                        <option value="">provider2</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" id="first_name" required="" data-error="Please enter your first name" placeholder="First Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="last_name" id="last_name" required="" data-error="Please enter your last name" placeholder="Last Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" id="phone" required="" data-error="Please enter your phone number" placeholder="Phone Number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input  type="email" class="form-control" name="email" id="email" required="" data-error="Please enter your email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="instagram" id="instagram" required="" data-error="Please enter your Instagram" placeholder="Instagram">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="website" id="website" required="" data-error="Please enter your website" placeholder="Website">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn disabled" style="pointer-events: all; cursor: pointer;">Send </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </section>
    </br>




@endsection


