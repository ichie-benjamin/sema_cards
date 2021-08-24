@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing Package Types</h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <button data-toggle="modal" data-target="#addPType" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name">Add Package Type:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
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
                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add a package type</h6>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <form action="{{ route('p_types.store') }}" method="POST" class="form-parsley">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group "><label>Name</label>
                                            <input required name="name" type="text" class="form-control" placeholder="name" />
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Price </label>
                                            <input required name="price" step="any"  value="{{ old('price') }}" type="number" class="form-control" placeholder="enter price" />
                                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button  class="btn btn-primary" type="submit">Save Package</button>
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
                                        <th>Name </th>
                                        <th>Price </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($types as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <form method="POST" action="{!! route('p_types.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                {{ csrf_field() }}

                                                <input name="_method" value="DELETE" type="hidden">


                                                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#editPack{{ $item->id }}" ><i class="fa fa-edit"></i> </button>


                                                <button type="submit" class="btn btn-danger" title="Delete Package type" onclick="return confirm('Are you sure you want to delete this package type ??')">
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

        @foreach($types as $item)

        @include('admin.inc.modals.edit_package_types')
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
