@extends('layouts.master')

@section('content')
    <hospital-table :status="{{ json_encode($status) }}" :hospitals="{{ json_encode($hospitals) }}" inline-template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Listing ({{ count($hospitals) }}) Hospital{{ count($hospitals) > 1 ? 's' : ''  }}</h4>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
{{--                            <a href="{{ route('card.delete.all_cards') }}" onclick="return confirm('Are you sure you want to delete all cards ?')" class="btn btn-danger">--}}
{{--                                Delete all cards--}}
{{--                            </a>--}}
{{--                            <button type="button" @click="toogleImport()" class="btn btn-sm btn-warning" id="Dash_Date">--}}
{{--                                <span class="day-name">Import Cards</span>--}}
{{--                            </button>--}}
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
                                    <input value="{{ old('cr', Request()->get('cr')) }}" name="cr" type="text" class="form-control" placeholder="Search by name or CR NO" />
                                </div>
                            </div>

                            <div class="col-3">
                                <button class="btn btn-primary mt-4" type="submit">Search</button>
                                <a href="{{ route('hospital.index') }}" class="btn btn-danger mt-4">Reset</a>

                                @if (request()->getRequestUri() == '/admin/hospitals')
                                    <a href="{{url()->current()}}?export" class="btn btn-success mt-4">Export Data</a>
                                @else
                                    <a href="{{ request()->getRequestUri() }}&export" class="btn btn-success mt-4">Export Data</a>
                                @endif


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
                                        <th>Provider Name</th>
                                        <th data-priority="1">CR No</th>
                                        <th data-priority="3">Email </th>
                                        <th data-priority="3">Contact </th>
                                        <th width="15%" data-priority="3">Status</th>
                                        <th data-priority="6">Category</th>
                                        <th data-priority="6">Expiry Date</th>
                                        <th width="10%" data-priority="6">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="i in hospitals.data" :key="i.id">
                                        <td class="text-capitalize">@{{ i.provider_name }}</td>
                                        <td>@{{ i.cpr_no }}</td>
                                        <td>@{{ i.email }}</td>
                                        <td> @{{ i.contact }}</td>
                                        <td class=" text-uppercase">

                                            <select v-model="i.status" @change="updateStatus(i.status, i)" class="form-control">
                                                <option v-for="it in status" :value="it"> @{{ it }}</option>
                                            </select>
                                        </td>
                                        <td>@{{ i.category }}</td>
                                        <td>@{{ i.expiry_date }}</td>
                                        <td>
{{--                                            <a class="btn btn-warning" href="{{ route('hospitals.edit', i.id) }}"><i class="fa fa-edit"></i> </a>--}}
                                            <a class="btn btn-warning" :href="i.edit_url"><i class="fa fa-edit"></i> </a>
                                                <a v-if="i.paid" class="btn btn-success" :href="i.view_url">View</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hospital ?')" :href="'/admin/hospital/delete/'+i.id"><i class="fa fa-trash"></i> </a>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->

                    <div class="card-footer">
                        {!! $hospitals->render() !!}
                    </div>
                </div>
                <!--end card-->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    </hospital-table>
@endsection



@section('js')
    <script src="https://mannatthemes.com/dastyle/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>

    <script src="/assets/pages/jquery.responsive-table.init.js"></script>

@endsection

@section('styles')
    <link href="https://mannatthemes.com/dastyle/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
