@extends('layouts.master')

@section('title')
Export Data
@endsection
@section('content')
    <hospital-table :status="{{ json_encode($status) }}" :hospitals="{{ json_encode($hospitals) }}" inline-template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing ({{ count($hospitals) }}) Card{{ count($hospitals) > 1 ? 's' : ''  }}</h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <button type="button" @click="toogleImport()" class="btn btn-sm btn-warning" id="Dash_Date">
                                <span class="day-name">Import Cards</span>
                            </button>
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">{{ date('M d') }}</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
        <!--end row--><!-- end page title end breadcrumb -->

        @include('admin.partials.msg.error')

        <div class="row">

            <div class="col-12" style="padding: 20px">
                <div class="card">

                        <form method="POST" enctype="multipart/form-data" action="{{ route('hospital.import') }}">
                            {{ csrf_field() }}
                            <div class="row m-4">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>CSV File</label>
                                    <input class="form-control" type="file" name="import_file" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary mt-4" type="submit">Submit</button>
                                <a href="{{ route('hospital.index') }}?imported" class="btn btn-warning mt-4">View all imported</a>
                            </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Export Data</h4>
                        <p class="text-muted mb-0">
                            Export either in CSV, EXCEL or PDF (select columns to export)
                        </p>
                    </div>
                    <!--end card-header-->
                    <div class="card-body table-responsive">
                        <table id="hospitals_table" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Provider Name</th>
                                <th >CR No</th>
                                <th>Email </th>
                                <th >Contact </th>
                                <th width="15%" >Status</th>
                                <th >Category</th>
                                <th>Expiry Date</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($hospitals as $item)
                                <tr>
                                    <td class="text-capitalize">{{ $item->provider_name }}</td>
                                    <td>{{ $item->cpr_no }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td> {{ $item->contact }}</td>
                                    <td class=" text-uppercase">
                                        {{ $item->status }}
                                    </td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->expiry_date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    </hospital-table>
@endsection



@section('js')
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/jszip.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/pdfmake.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/vfs_fonts.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/buttons.html5.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/buttons.print.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="https://mannatthemes.com/dastyle/plugins/datatables/responsive.bootstrap4.min.js"></script>
{{--    <script src="/assets/pages/jquery.datatable.init.js"></script>--}}
    <!-- App js -->

    <script>
        $(document).ready(function () {
            $('#hospitals_table').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            } );
        });
    </script>
@endsection

@section('styles')
    <!-- DataTables -->
    <link href="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://mannatthemes.com/dastyle/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
