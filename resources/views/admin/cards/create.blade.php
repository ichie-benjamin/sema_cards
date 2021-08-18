@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Create New Card</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ env('APP_NAME') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Cards</a></li>
                                <li class="breadcrumb-item active">Add new</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Jan 11</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-primary"><i data-feather="download" class="align-self-center icon-xs"></i></a>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.msg.error')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Card</h4>
                    </div>
                    <!--end card-header-->

                    <div class="card-body">
                        <form method="POST" class="form-parsley" action="{{ route('cards.store') }}" >
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
                                        <input  value="{{ old('email') }}" name="email" type="text" class="form-control" placeholder="Email Address" />
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group "><label>Agent</label>
                                        <select class="form-control" name="agent_id">
                                            @foreach($agents as $item)
                                            <option {{ $item->id == $agent ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
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
                                        <input  value="{{ old('mobile') }}" name="mobile" type="text" class="form-control" placeholder="mobile number" />
                                        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="form-group "><label>Phone No.</label>
                                        <input value="{{ old('phone') }}" name="phone" type="text" class="form-control" placeholder="phone number" />
                                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
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
                                <div class="col-md-3 col-6">
                                    <div class="form-group "><label>Status</label>
                                        <select class="form-control" name="status">
                                            @foreach($status as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label" for="description">Upload Image </label>
                                    @include('admin.inc.image-upload',['field' => 'photo','id' => 'photo'])
                                </div>

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
                        <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>


    </div>
@endsection





