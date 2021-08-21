@extends('layouts.frontend')
@section('content')
    <div class="wrapper" id="app">



        <section class="module divider-bottom" id="search">
            <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="m-b-20">
                    <h3 class="text-center">Fill out form</h3>
                </div>
                <div class="m-b-20">
                    @include('admin.partials.msg.all')

                    <form method="POST" class="form-parsley" action="{{ route('cards.online.store') }}" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group "><label>Full name</label>
                                    <input required name="full_name" value="{{ old('full_name') }}" type="text" class="form-control" placeholder="Full name" />
                                    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>CPR No.</label>
                                    <input required value="{{ old('cpr_no') }}" name="cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                                    {!! $errors->first('cpr_no', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Email.</label>
                                    <input  value="{{ old('email') }}" required name="email" type="text" class="form-control" placeholder="Email Address" />
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Mobile No.</label>
                                    <input required value="{{ old('mobile') }}" name="mobile" type="text" class="form-control" placeholder="mobile number" />
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Phone No.</label>
                                    <input value="{{ old('phone') }}" name="phone" type="text" class="form-control" placeholder="phone number" />
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-6">

                                <div class="form-group "><label>Period</label>

                                    <select class="form-control" name="period">
                                        <option value="3">3 Months</option>

                                        <option value="6">6 Months</option>
                                        <option value="12">1 Year</option>
                                        <option value="24">2 Years</option>
                                        <option value="60">5 Years</option>
                                    </select>
                                    {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                                    <input  value="{{ old('address') }}" name="address" type="text" class="form-control" placeholder="address" />
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Card Type</label>
                                    <select class="form-control" name="card_type">
                                        @foreach ($card_types as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('card_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="col-md-3 col-6">

                                <div class="form-group "><label>Payment Method</label>
                                    <select class="form-control" name="payment_method">
                                        @foreach ($p_methods as $item)
                                            <option class="text-capitalize" value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Contact Method</label>
                                    <select class="form-control" name="contact_method">
                                        @foreach ($con_methods as $item)
                                            <option class="text-capitalize" value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('contact_method', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="form-group "><label>Package Type</label>
                                    <select class="form-control" name="package_type">
                                        @foreach ($p_type as $item)
                                            <option class="text-capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('package_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="status" value="pending" />
                            <input type="hidden" class="form-control" name="online" value="1" />

                            <div class="col-12">
                                <div class="form-group"><label>Comment </label>
                                    <textarea class="form-control" name="comment">{{ old('comment') }}</textarea>
                                    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>




                            <div class="col-12">
                                {{--                                    <button class="btn btn-primary" type="submit">Submit form</button>--}}
                                <input name="more" class="btn btn-primary" type="submit" value="Submit Form" />
                            </div>
                        </div>

                        <!--end form-group-->
                    </form>
                </div>
                <div class="m-b-20">
                    <p><small>By signing up, you agree to the<a href="#">terms of service</a></small></p>
                </div>
            </div>
        </div>

            </div>
        </section>

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
