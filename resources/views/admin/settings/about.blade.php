@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">About Page</h4>
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

                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">About Page Setting</h6>


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
                                            <td class="text-capitalize">About Heading</td>
                                            <td>
                                                <input class="form-control" width="70%" name="about_heading" type="text"  required value="{{ setting('about_heading','<h2>Short Story About <span>Sema Bahrain</span> Card.</h2> ') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">About Small Heading</td>
                                            <td>
                                                <input class="form-control" width="70%" name="small_heading" type="text"  required value="{{ setting('small_heading') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">About Big Heading</td>
                                            <td>
                                                <input class="form-control" width="70%" name="big_heading" type="text"  required value="{{ setting('big_heading') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">Mission</td>
                                            <td>
                                                <textarea class="form-control" width="70%" name="site_info" type="text"  required>
                                                    {{ setting('mission') }}
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">Vision</td>
                                            <td>
                                                <textarea class="form-control" width="70%" name="vision" type="text"  required>
                                                    {{ setting('vision') }}
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize">About</td>
                                            <td>
                                                <textarea class="form-control" width="70%" name="about" type="text"  required>
                                                    {{ setting('about') }}
                                                </textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-capitalize">About Image</td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a data-input="logo_color_thumbnail" data-preview="logo_color" class="btn btn-primary lfm">
                                                            <i class="fas fa-picture"></i> Choose Image</a>
                                                    </span>
                                                    <input id="logo_color_thumbnail" class="form-control" type="text" value="{{ setting('about_image') }}" name="about_image">
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
