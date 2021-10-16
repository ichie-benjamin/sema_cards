@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Edit Hospital</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ env('APP_NAME') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hospitals</a></li>
                                <li class="breadcrumb-item active">Edit hospital</li>
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

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            EDIT HOSPITAL INFO
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <form method="POST" class="form-parsley" action="{{ route('hospital.update', $hospital->id) }}" >
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Editing {{ $hospital->provider_name }}</h4>
                                        </div>
                                        <!--end card-header-->

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group "><label>Provider name</label>
                                                        <input required name="provider_name" value="{{ old('provider_name', $hospital->provider_name) }}" type="text" class="form-control" placeholder="provider_name" />
                                                        {!! $errors->first('provider_name', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>CPR No.</label>
                                                        <input required value="{{ old('cpr_no', $hospital->cpr_no) }}" name="cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                                                        {!! $errors->first('cpr_no', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Email.</label>
                                                        <input  value="{{ old('email',$hospital->email) }}" name="email" type="text" class="form-control" placeholder="Email Address" />
                                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Contact 1</label>
                                                        <input  value="{{ old('contact', $hospital->contact) }}" name="contact" type="text" class="form-control" placeholder="Contact 1" />
                                                        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Contact 2</label>
                                                        <input  value="{{ old('contact2', $hospital->contact2) }}" name="contact2" type="text" class="form-control" placeholder="Contact 2" />
                                                        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Website</label>
                                                        <input  value="{{ old('website', $hospital->website) }}" name="website" type="text" class="form-control" placeholder="website" />
                                                        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Category</label>
                                                        <input  value="{{ old('category', $hospital->category) }}" name="website" type="text" class="form-control" placeholder="category" />
                                                        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Specialty</label>
                                                        <input  value="{{ old('specialist', $hospital->specialist) }}" name="specialist" type="text" class="form-control" placeholder="specialty" />
                                                        {!! $errors->first('specialty', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Contract File</label>
                                                        <input value="{{ old('contract_file', $hospital->contract_file) }}" name="contract_file" type="text" class="form-control" placeholder="contract file" />
                                                        {!! $errors->first('contract_file', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Contract Date</label>
                                                        <input value="{{ old('contract_date', $hospital->contract_date) }}" name="contract_date" type="text" class="form-control" placeholder="contract date" />
                                                        {!! $errors->first('contract_date', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Expiry Date </label>
                                                        <input value="{{ old('expiry_date', $hospital->expiry_date) }}" name="expiry_date" type="date" class="form-control" placeholder="expiry_date" />
                                                        {!! $errors->first('expiry_date', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group "><label>Image </label>
                                                        @include('admin.inc.image-upload',['field' => 'image','id' => 'Image', 'image' => $hospital->image])
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                                                        <input  value="{{ old('address', $hospital->address) }}" name="address" type="text" class="form-control" placeholder="address" />
                                                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <hr />


                                                <div class="col-12">
                                                    <div class="form-group"><label>Description </label>
                                                        <textarea class="form-control" name="description">{{ old('description', $hospital->description) }}</textarea>
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
                                            <h4 class="card-title">Edit Hospital (Arabic)</h4>
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
                                    <input class="btn btn-primary" type="submit" value="Update Hospital" />
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            HOSPITAL SERVICES
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="page-title">Listing Hospital Services</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto align-self-center">
                                            <button data-toggle="modal" data-target="#addPType" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                                <span class="day-name">Add Service Type:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
                                            </button>
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


                        <div class="modal fade" id="addPType" tabindex="-1" role="dialog" aria-labelledby="addPType" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add service</h6>
                                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-times"></i></span>
                                        </button>
                                    </div>
                                    <!--end modal-header-->
                                    <div class="modal-body">
                                        <div class="card-body p-0">
                                            <form action="{{ route('service.store') }}" method="POST" class="form-parsley">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $hospital->id }}" name="hospital_id">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group "><label>The service In English</label>
                                                            <input required name="name" type="text" class="form-control" placeholder="name" />
                                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>The service In Arabic</label>
                                                            <input value="" name="ar_name" type="text" class="form-control" placeholder="arabic" />
                                                            {!! $errors->first('ar_name', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Price </label>
                                                            <input required name="price" step="any"  value="{{ old('price') }}" type="number" class="form-control" placeholder="enter price" />
                                                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Discount (%) </label>
                                                            <input name="discount" step="any"  value="{{ old('discount') }}" type="number" class="form-control" placeholder="enter discount" />
                                                            {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button  class="btn btn-primary" type="submit">Save Service</button>
                                                    </div>
                                                </div>

                                                <!--end form-group-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--end modal-body-->
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>

                        <!--end row--><!-- end page title end breadcrumb -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                @include('admin.partials.msg.error')
                                <!--end card-header-->
                                    <div class="card-body">

                                        <div class="">
                                            <div class="table-responsive mb-0">

                                                <table id="datatable" class="dt-responsive table table-striped table-bordered mb-0">

                                                    <thead>
                                                    <tr>
                                                        <th>Service In English </th>
                                                        <th>Service In Arabic </th>
                                                        <th>Price </th>
                                                        <th>Discount (%) </th>
                                                        <th>Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($services as $item)
                                                        <tr>
                                                            <td class="text-capitalize">{{ $item->name }}</td>
                                                            <td class="text-capitalize">{{ $item->ar_name }}</td>
                                                            <td>BD{{ $item->price }}</td>
                                                            <td>{{ $item->discount }}%</td>
                                                            <td>
                                                                <form method="POST" action="{!! route('service.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                                    {{ csrf_field() }}

                                                                    <input name="_method" value="DELETE" type="hidden">

                                                                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#editService{{ $item->id }}" ><i class="fa fa-edit"></i> </button>

                                                                    <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm('Are you sure you want to delete this service ??')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>

                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        @foreach($services as $item)

                            @include('admin.inc.modals.edit_service')
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="contact">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#contact" aria-expanded="false" aria-controls="contact">
                            HOSPITAL CONTACTS
                        </button>
                    </h5>
                </div>
                <div id="contact" class="collapse show" aria-labelledby="contact" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="page-title">Listing Contacts</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto align-self-center">
                                            <button data-toggle="modal" data-target="#addC" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                                <span class="day-name">Add Contact:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
                                            </button>
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


                        <div class="modal fade" id="addC" tabindex="-1" role="dialog" aria-labelledby="addC" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add Contact</h6>
                                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-times"></i></span>
                                        </button>
                                    </div>
                                    <!--end modal-header-->
                                    <div class="modal-body">
                                        <div class="card-body p-0">
                                            <form action="{{ route('contact.store') }}" method="POST" class="form-parsley">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $hospital->id }}" name="hospital_id">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Name </label>
                                                            <input required name="name" type="text" class="form-control" placeholder="name" />
                                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Position</label>
                                                            <input value="" name="position" type="text" class="form-control" placeholder="position" />
                                                            {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Mobile </label>
                                                            <input required name="mobile" step="any"  value="{{ old('mobile') }}" type="text" class="form-control" placeholder="enter mobile" />
                                                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group "><label>Email </label>
                                                            <input required name="email" step="any"  value="{{ old('email') }}" type="text" class="form-control" placeholder="enter email" />
                                                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button  class="btn btn-primary" type="submit">Save Contact</button>
                                                    </div>
                                                </div>

                                                <!--end form-group-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--end modal-body-->
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>

                        <!--end row--><!-- end page title end breadcrumb -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                @include('admin.partials.msg.error')
                                <!--end card-header-->
                                    <div class="card-body">

                                        <div class="">
                                            <div class="table-responsive mb-0">

                                                <table id="datatable" class="dt-responsive table table-striped table-bordered mb-0">

                                                    <thead>
                                                    <tr>
                                                        <th>Name  </th>
                                                        <th>Position </th>
                                                        <th>Email </th>
                                                        <th>Phone </th>
                                                        <th>Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($contacts as $item)
                                                        <tr>
                                                            <td class="text-capitalize">{{ $item->name }}</td>
                                                            <td class="text-capitalize">{{ $item->position }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->mobile }}</td>
                                                            <td>

                                                                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#editContact{{ $item->id }}" ><i class="fa fa-edit"></i> </button>

                                                                    <a href="{{ route('contact.delete', $item->id) }}" class="btn btn-danger" title="Delete Service" onclick="return confirm('Are you sure you want to delete this contact ??')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>

                                                            </td>

                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        @foreach($services as $item)

                            @include('admin.inc.modals.edit_service')
                        @endforeach


                        @foreach($contacts as $item)

                            @include('admin.inc.modals.edit_service')
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

                <!--end card-->

        </div>


    </div>
@endsection





