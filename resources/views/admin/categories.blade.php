@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing Categories</h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <button data-toggle="modal" data-target="#addPType" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name">Add Category:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
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
                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add a category</h6>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <form action="{{ route('categories.store') }}" method="POST" class="form-parsley">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group "><label>Category In English</label>
                                            <input required name="name" type="text" class="form-control" placeholder="name" />
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Category In Arabic</label>
                                            <input value="" name="name_ar" type="text" class="form-control" placeholder="arabic" />
                                            {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button  class="btn btn-primary" type="submit">Save Category</button>
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
                                        <th>Category In English </th>
                                        <th>Category In Arabic </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ $item->name }}</td>
                                        <td class="text-capitalize">{{ $item->name_ar }}</td>
                                        <td>
                                            <form method="POST" action="{!! route('categories.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                {{ csrf_field() }}

                                                <input name="_method" value="DELETE" type="hidden">
                                                <button type="submit" class="btn btn-danger" title="Delete Category " onclick="return confirm('Are you sure you want to delete this category ??')">
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
