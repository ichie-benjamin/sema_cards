@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Create New Hospital</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ env('APP_NAME') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hospitals</a></li>
                                <li class="breadcrumb-item active">Add new</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">{{ date('m d') }}</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
            </div>
        </div>

                <form method="POST" class="form-parsley" action="{{ route('hospital.store') }}" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Hospital</h4>
                                </div>
                                <!--end card-header-->

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group "><label>Provider name</label>
                                                <input required name="provider_name" value="{{ old('provider_name') }}" type="text" class="form-control" placeholder="provider_name" />
                                                {!! $errors->first('provider_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>CPR No.</label>
                                                <input required value="{{ old('cpr_no') }}" name="cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                                                {!! $errors->first('cpr_no', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Email.</label>
                                                <input  value="{{ old('email') }}" name="email" type="text" class="form-control" placeholder="Email Address" />
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contact 1</label>
                                                <input  value="{{ old('contact') }}" name="contact" type="text" class="form-control" placeholder="Contact 1" />
                                                {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contact 2</label>
                                                <input  value="{{ old('contact2') }}" name="contact2" type="text" class="form-control" placeholder="Contact 2" />
                                                {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Website</label>
                                                <input  value="{{ old('website') }}" name="website" type="text" class="form-control" placeholder="website" />
                                                {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Category</label>
                                                <input  value="{{ old('category') }}" name="category" type="text" class="form-control" placeholder="category" />
                                                {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Specialty</label>
                                                <input  value="{{ old('specialty') }}" name="specialty" type="text" class="form-control" placeholder="specialty" />
                                                {!! $errors->first('specialty', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contract File</label>
                                                <input value="{{ old('contract_file') }}" name="contract_file" type="text" class="form-control" placeholder="contract file" />
                                                {!! $errors->first('contract_file', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contract Date</label>
                                                <input value="{{ old('contract_date') }}" name="contract_date" type="text" class="form-control" placeholder="contract date" />
                                                {!! $errors->first('contract_date', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Expiry Date </label>
                                                <input value="{{ old('expiry_date') }}" name="expiry_date" type="date" class="form-control" placeholder="expiry_date" />
                                                {!! $errors->first('expiry_date', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Image </label>
                                                @include('admin.inc.image-upload',['field' => 'image','id' => 'Image'])
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                                                <input  value="{{ old('address') }}" name="address" type="text" class="form-control" placeholder="address" />
                                                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <hr />


                                        <div class="col-12">
                                            <div class="form-group"><label>Description </label>
                                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                    </div>

                                    <!--end form-group-->

                                    <!--end form-->
                                </div>
                                <!--end card-body-->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Hospital (Arabic)</h4>
                                </div>
                                <!--end card-header-->

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group "><label>Provider name</label>
                                                <input  name="ru_provider_name" value="{{ old('ru_provider_name') }}" type="text" class="form-control" placeholder="provider_name" />
                                                {!! $errors->first('ru_provider_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>CPR No.</label>
                                                <input  value="{{ old('cpr_no') }}" name="ru_cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                                                {!! $errors->first('ru_cpr_no', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Email.</label>
                                                <input  value="{{ old('ru_email') }}" name="ru_email" type="text" class="form-control" placeholder="Email Address" />
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contact 1</label>
                                                <input  value="{{ old('ru_contact') }}" name="ru_contact" type="text" class="form-control" placeholder="Contact 1" />
                                                {!! $errors->first('ru_contact', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contact 2</label>
                                                <input  value="{{ old('ru_contact2') }}" name="ru_contact2" type="text" class="form-control" placeholder="Contact 2" />
                                                {!! $errors->first('ru_contact', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Website</label>
                                                <input  value="{{ old('ru_website') }}" name="ru_website" type="text" class="form-control" placeholder="website" />
                                                {!! $errors->first('ru_website', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Category</label>
                                                <input  value="{{ old('ru_category') }}" name="ru_category" type="text" class="form-control" placeholder="category" />
                                                {!! $errors->first('ru_category', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Specialty</label>
                                                <input  value="{{ old('ru_specialist') }}" name="ru_specialist" type="text" class="form-control" placeholder="specialty" />
                                                {!! $errors->first('ru_specialist', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contract File</label>
                                                <input value="{{ old('ru_contract_file') }}" name="ru_contract_file" type="text" class="form-control" placeholder="contract file" />
                                                {!! $errors->first('ru_contract_file', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Contract Date</label>
                                                <input value="{{ old('ru_contract_date') }}" name="ru_contract_date" type="text" class="form-control" placeholder="contract date" />
                                                {!! $errors->first('ru_contract_date', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Expiry Date </label>
                                                <input value="{{ old('ru_expiry_date') }}" name="ru_expiry_date" type="date" class="form-control" placeholder="expiry_date" />
                                                {!! $errors->first('ru_expiry_date', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-6">
                                            <div class="form-group "><label>Image </label>
                                                @include('admin.inc.image-upload',['field' => 'ru_image','id' => 'Image'])
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                                                <input  value="{{ old('ru_address') }}" name="ru_address" type="text" class="form-control" placeholder="address" />
                                                {!! $errors->first('ru_address', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <hr />


                                        <div class="col-12">
                                            <div class="form-group"><label>Description </label>
                                                <textarea class="form-control" name="ru_description">{{ old('ru_description') }}</textarea>
                                                {!! $errors->first('ru_description', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                    </div>

                                    <!--end form-group-->

                                    <!--end form-->
                                </div>
                                <!--end card-body-->
                            </div>
                        </div>


                        <div class="col-12" style="margin-bottom: 100px">
                            <input name="more" class="btn btn-primary" type="submit" value="Submit Form" />
                        </div>
                    </div>

                </form>
                <!--end card-->

        </div>


    </div>
@endsection





