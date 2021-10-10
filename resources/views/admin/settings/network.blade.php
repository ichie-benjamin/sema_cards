@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Network Setting</h4>
                        </div>

                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>


        <!--end row--><!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                @include('admin.partials.msg.error')
                <!--end card-header-->
                    <div class="card-body">
                        <div class="">
                            <form action="{{ route('settings.store') }}" method="POST">

                                @csrf

                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Network Links</h6>


                                <input value="Save" type="submit" class="btn btn-success float-right  mr-2" />
                                <div class="table-wrapper">
                                    <table class="table table-bordered display table-condensed responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th class="wd-20p"> Name</th>
                                            <th class="wd-70p">Value</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-capitalize">Network English</td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="network_en_thumbnail" data-preview="network_en" class="btn btn-primary lff">
                                                            <i class="fas fa-picture"></i> Choose File</a>
                                                    </span>
                                                    <input id="network_en_thumbnail" class="form-control" type="text" value="{{ setting('network_en') }}" name="network_en">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">Network Arabic</td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a  data-input="network_ar_thumbnail" data-preview="network_ar" class="btn btn-primary lff">
                                                            <i class="fas fa-picture"></i> Choose File</a>
                                                    </span>
                                                    <input id="network_ar_thumbnail" class="form-control" type="text" value="{{ setting('network_ar') }}" name="network_ar">
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div><!-- table-wrapper -->

                                <input value="Save" type="submit" class="btn btn-success float-right" />

                            </form>
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
