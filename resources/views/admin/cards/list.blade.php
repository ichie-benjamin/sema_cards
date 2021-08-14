@extends('layouts.master')

@section('content')
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
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Jan 11</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="get">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group "><label>From</label>
                                    <input name="from" value="{{ Request()->get('from') }}" type="date" class="form-control" placeholder="Date" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group "><label>To</label>
                                    <input name="to" value="{{ Request()->get('to') }}" type="date" class="form-control" placeholder="Date" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group "><label>Status</label>
                                    <select class="form-control" name="s">
                                        <option selected value="">All</option>
                                        @foreach($status as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group "><label>Search</label>
                                    <input value="{{ old('cpr', Request()->get('cpr')) }}" name="cpr" type="text" class="form-control" placeholder="Search by name or CPR NO" />
                                </div>
                            </div>

                            <div class="col-3">
                                <button class="btn btn-primary mt-4" type="submit">Search</button>
                                <a href="{{ route('cards.index') }}" class="btn btn-danger mt-4">Reset</a>

                            </div>


                        </div>
                        </form>

                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-colums">
                                <table id="tech-companies-1" class="table table-striped table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>Agent</th>
                                        <th>Full name</th>
                                        <th data-priority="1">CPR No</th>
                                        <th data-priority="3">Phone No.</th>
                                        <th data-priority="1">Extra <br /> People</th>
                                        <th data-priority="3">Email</th>
                                        <th data-priority="3">Status</th>
                                        <th data-priority="3">Package Type</th>
                                        <th data-priority="6">Paid</th>
                                        <th data-priority="6">Expiry Date</th>
                                        <th data-priority="6">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cards as $item)
                                    <tr>
                                        <td class="text-capitalize">{{ optional($item->agent)->full_name }}</td>
                                        <td class="text-capitalize">{{ $item->full_name }}</td>
                                        <td>{{ $item->cpr_no }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ count($item->cards) }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class=" text-uppercase">{{ $item->status }}</td>
                                        <td class="text-capitalize">{{ optional($item->package)->name }}</td>
                                        <td>{{ $item->paid ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->expiry_date }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('cards.edit', $item->id) }}"><i class="fa fa-edit"></i> </a>
                                            @if ($item->paid)
                                                <a class="btn btn-success" href="{{ route('cards', $item->policy_no) }}">View Cards</a>
                                            @endif
                                            <a class="btn btn-danger" href=""><i class="fa fa-trash"></i> </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->

                    <div class="card-footer">
                        {!! $cards->render() !!}
                    </div>
                </div>
                <!--end card-->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection



@section('js')
    <script src="https://mannatthemes.com/dastyle/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>

    <script src="/assets/pages/jquery.responsive-table.init.js"></script>
@endsection

@section('styles')
    <link href="https://mannatthemes.com/dastyle/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
