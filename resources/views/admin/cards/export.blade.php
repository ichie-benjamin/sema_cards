@extends('layouts.master')

@section('title')
Export Data
@endsection
@section('content')
    <card-table :status="{{ json_encode($status) }}" :cards="{{ json_encode($cards) }}" inline-template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing ({{ count($cards) }}) Card{{ count($cards) > 1 ? 's' : ''  }}</h4>
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

                        <form method="POST" enctype="multipart/form-data" action="{{ route('cards.import') }}">
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
                                <a href="{{ route('cards.index') }}?imported" class="btn btn-warning mt-4">View all imported</a>
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
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th class="text-capitalize">Parent CPR</th>
                                <th class="text-capitalize">cpr</th>
                                <th class="text-capitalize">Issue Date</th>
                                <th class="text-capitalize">First Issue Date</th>
                                <th class="text-capitalize">agent</th>
                                <th class="text-capitalize">Name</th>
                                <th class="text-capitalize">Dependents</th>
                                <th class="text-capitalize">email</th>
                                <th class="text-capitalize">gender</th>
                                <th class="text-capitalize">phone</th>
                                <th class="text-capitalize">mobile</th>
                                <th class="text-capitalize">mobile 2</th>
                                <th class="text-capitalize">status</th>
                                <th class="text-capitalize">Package</th>
                                <th class="text-capitalize">Period (months)</th>
                                <th class="text-capitalize">paid</th>
                                <th class="text-capitalize">expiry date</th>
                                <th class="text-capitalize">price (BD)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cards as $item)
                            <tr>
                                <td>
                                    @if ($item->is_parent)
                                        ++++++
                                    @else
                                        {{ optional($item->card)->cpr_no }}<br/>
                                        [{{ optional($item->card)->full_name }}]

                                    @endif
                                </td>
                                <td>{{ $item->cpr_no }}</td>
                                <td>{{ $item->issue_date }}</td>
                                <td>{{ $item->first_issue_date }}</td>
                                <td>{{ optional($item->agent)->full_name }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ count($item->cards) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->mobile2 }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->p_name }}</td>
                                <td>{{ $item->period }}</td>
                                <td>{{ $item->paid ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->expiry_date }}</td>
                                <td>{{ $item->price }}</td>

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
    </card-table>
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
    <script src="/assets/pages/jquery.datatable.init.js"></script>
    <!-- App js -->

@endsection

@section('styles')
    <!-- DataTables -->
    <link href="https://mannatthemes.com/dastyle/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://mannatthemes.com/dastyle/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
