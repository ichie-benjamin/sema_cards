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
            <h2 class="mb-4 mt-4">Contact Us</h2>
            <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-box">
                            <h3><i class="icofont-google-map"></i> Address</h3>
                            <p><a href="https://www.google.com/maps/place/Exercisplan+4,+111+49+Stockholm,+Sweden/data=!4m2!3m1!1s0x465f9d5641a77669:0xe02744b36aab9f53?ved=2ahUKEwi38ZaU0rXfAhVWeH0KHY5CBWYQ8gEwAHoECAAQAQ" target="_blank">Exercisplan 4, 111 49 <br> Stockholm,Sweden</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-box">
                            <h3><i class="icofont-envelope"></i> Email</h3>
                            <p><a href="#">info@doctor.com</a></p>
                            <p><a href="#">support@doctor.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-box">
                            <h3><i class="icofont-phone"></i> Phone</h3>
                            <p><a href="#">+44 4587 458</a></p>
                            <p><a href="#">+44 4587 459</a></p>
                        </div>
                    </div>



                <div class="col-lg-8 col-md-12">
                    <form id="contactForm" novalidate="true">
                        <div class="row">

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

                            <div class="form-group has-error">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" required="" data-error="Write your message" placeholder="Message"></textarea>
                                <div class="help-block with-errors"><ul class="list-unstyled"><li>Write your message</li></ul></div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn disabled" style="pointer-events: all; cursor: pointer;">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </section>

    <br>




@endsection


