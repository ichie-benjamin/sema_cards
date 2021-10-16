@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing Sliders </h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <button data-toggle="modal" data-target="#addPType" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name">Add New Slider:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
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
                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add a slider</h6>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <form action="{{ route('sliders.store') }}" method="POST" class="form-parsley">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group "><label>Heading In English</label>
                                            <input required name="head_en" type="text" class="form-control" placeholder="name" />
                                            {!! $errors->first('head_en', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Heading In Arabic</label>
                                            <input value="" name="head_ar" type="text" class="form-control" placeholder="arabic" />
                                            {!! $errors->first('ar', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                      <div class="col-12">
                                        <div class="form-group "><label>Sub Heading In English</label>
                                            <input required name="sub_head_en" type="text" class="form-control" placeholder="sub_head_en" />
                                            {!! $errors->first('sub_head_en', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Sub Heading In Arabic</label>
                                            <input value="" name="sub_head_ar" type="text" class="form-control" placeholder="sub_head_en" />
                                            {!! $errors->first('sub_head_ar', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group "><label>Image </label>
                                            @include('admin.inc.image-upload',['field' => 'img','id' => 'Image'])
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button  class="btn btn-primary" type="submit">Save Slider</button>
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
                                        <th>Heading In Eng </th>
                                        <th>Heading In Ar</th>
                                        <th>Sub Heading In Eng </th>
                                        <th>Sub Heading In Ar</th>
                                        <th>Image </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ $item->head_en }}</td>
                                        <td class="text-capitalize">{{ $item->head_ar }}</td>
                                        <td>{{ $item->sub_head_en }}</td>
                                        <td>{{ $item->sub_head_ar }}</td>
                                        <td><img height="50px" width="50px" src="{{ $item->img }}" /> </td>
                                        <td>
                                            <form method="POST" action="{!! route('p_types.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                {{ csrf_field() }}

                                                <input name="_method" value="DELETE" type="hidden">


                                                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit{{ $item->id }}" ><i class="fa fa-edit"></i> </button>


                                                <button type="submit" class="btn btn-danger" title="Delete Slider " onclick="return confirm('Are you sure you want to delete this slider type ??')">
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

        @foreach($sliders as $item)

        @include('admin.inc.modals.edit_slider')
        @endforeach
    </div>
@endsection



@section('js')
    <!-- Required datatable js -->
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->

    <!-- Responsive examples -->
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/assets/pages/jquery.datatable.init.js"></script>
    <!-- App js -->
@endsection

@section('styles')
    <link href="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="https://mannatthemes.com/dastyle/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
