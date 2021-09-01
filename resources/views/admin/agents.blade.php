@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing Agents</h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <button data-toggle="modal" data-target="#addAgent" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name">Add Agent:</span>&nbsp;  <i data-feather="plus" class="align-self-center icon-xs ml-1"></i>
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


        <div class="modal fade" id="addAgent" tabindex="-1" role="dialog" aria-labelledby="addAgent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Add an agent</h6>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <form action="{{ route('agent.store') }}" method="POST" class="form-parsley">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group "><label>Full name</label>
                                            <input required name="full_name" type="text" class="form-control" placeholder="Full name" />
                                            {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Email Address</label>
                                            <input required name="email"  value="{{ old('email') }}" type="text" class="form-control" placeholder="Email Address" />
                                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Username</label>
                                            <input required name="username"  value="{{ old('username') }}" type="text" class="form-control" placeholder="Username" />
                                            {!! $errors->first('username', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Phone</label>
                                            <input required name="phone"  value="{{ old('phone') }}" type="text" class="form-control" placeholder="phone" />
                                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group "><label>Password </label>
                                            <input required name="password"  value="{{ old('password') }}" type="text" class="form-control" placeholder="password" />
                                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button  class="btn btn-primary" type="submit">Save Agent</button>
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
                                        <th>Full name</th>
                                        <th data-priority="1">Email</th>
                                        <th data-priority="1">Username</th>
                                        <th data-priority="3">Total Cards</th>
                                        <th data-priority="3">Draft Cards</th>
                                        <th data-priority="3">Done Cards</th>
                                        <th data-priority="3">Paid Cards</th>
                                        <th data-priority="3">Print Cards</th>
                                        <th data-priority="4">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($agents as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ $item->full_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->cards()->count() }}</td>
                                        <td>{{ $item->cards()->whereStatus('draft')->count() }}</td>
                                        <td>{{ $item->cards()->whereStatus('done')->count() }}</td>
                                        <td>{{ $item->cards()->whereStatus('paid')->count() }}</td>
                                        <td>{{ $item->cards()->whereStatus('print')->count() }}</td>
                                        <td>
                                            <form method="POST" action="{!! route('agent.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                {{ csrf_field() }}

                                                <input name="_method" value="DELETE" type="hidden">


                                                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#editAgent{{ $item->id }}" ><i class="fa fa-edit"></i> </button>


                                                <button type="submit" class="btn btn-danger" title="Delete Agent" onclick="return confirm('Are you sure you want to delete this agent ??')">
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

        @foreach($agents as $item)

        @include('admin.inc.modals.edit_agent')
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
