@extends('layouts.master')

@section('content')

<card-table :status="{{ json_encode($status) }}" :cards="{{ json_encode($l_cards) }}" inline-template>
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{ env('APP_NAME') }}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="ay-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">{{ date('m d') }}</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Sama Cards</p>
                                <h3 class="my-2">{{ \App\Models\Card::count() }}</h3>
                                <p class="mb-0 text-truncate text-muted">
                                    <span class="text-success"><i class="mdi mdi-trending-up"></i><a href="{{ route('cards.index') }}">All created cards</a></span>
                                </p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt"><i data-feather="users" class="align-self-center text-muted icon-md"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Agents</p>
                                <h3 class="my-2">{{ $agents }}</h3>
                                <p class="mb-0 text-truncate text-muted">
                                    <span class="text-success"><i class="mdi mdi-trending-up"></i><a href="{{ route('agents') }}"> All registered agents</a></span>
                                </p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt"><i data-feather="clock" class="align-self-center text-muted icon-md"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Agent Cards</p>
                                <h3 class="my-2">{{ $agent_cards }}</h3>
                                <p class="mb-0 text-truncate text-muted">
                                    <span class="text-success"><i class="mdi mdi-trending-down"></i><a href="{{ route('cards.index') }}?agent"> All agent registered cards</a></span>
                                </p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt"><i data-feather="activity" class="align-self-center text-muted icon-md"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Imported Cards</p>
                                <h3 class="my-2">{{ $imported_cards }}</h3>
                                <p class="mb-0 text-truncate text-muted">
                                    <span class="text-danger"><a href="{{ route('cards.index') }}?imported"> <i class="mdi mdi-trending-up"></i>All imported cards</a></span>
                                </p>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt"><i data-feather="briefcase" class="align-self-center text-muted icon-md"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Draft </p>
                                <h3 class="my-0">{{ $data['draft'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?s=draft">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Pending  </p>
                                <h3 class="my-0">{{ $data['pending'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?s=pending">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Renewal   </p>
                                <h3 class="my-0">{{ $data['renewal'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?renewal">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Expired    </p>
                                <h3 class="my-0">{{ $data['expired'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?expired">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Today sales</p>
                                <h3 class="my-0">{{ $data['today'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?today">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Done</p>
                                <h3 class="my-0">{{ $data['done'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?s=done">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Paid</p>
                                <h3 class="my-0">{{ $data['paid'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?s=paid">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <p class="text-dark mb-1 font-weight-semibold">Total Online</p>
                                <h3 class="my-0">{{ $data['online'] }}</h3>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="report-main-icon bg-light-alt">
                                    <a href="{{ route('cards.index') }}?online">
                                        <i data-feather="package" class="align-self-center text-muted icon-md"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>


        </div>
        <!--end row-->

        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col"><h4 class="card-title">Recent Cards</h4></div>
                            <!--end col-->
                            <div class="col-auto">
                                <ul class="nav nav-pills-custom nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item mr-1">
                                        <a class="nav-link active"  href="{{ route('cards.index') }}" >View All Cards</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('cards.create') }}" >Add New Card</a></li>
                                </ul>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Traffic_Sources" role="tabpanel" aria-labelledby="pills-traffic-tab">

                                <div class="table-responsive browser_users">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th width="15%">Issue Date / Agent</th>
                                            <th>Full name</th>
                                            <th data-priority="1">CPR No</th>
                                            {{--                                        <th data-priority="3">Phone No.</th>--}}
                                            <th data-priority="1">Extra <br /> People</th>
                                            <th data-priority="3">Email / Phone</th>
                                            <th width="15%" data-priority="3">Status</th>
                                            <th data-priority="3">Package Type</th>
                                            <th data-priority="6">Paid</th>
                                            <th data-priority="6">Expiry Date</th>
                                            <th width="10%" data-priority="6">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="i in cards.data">
                                            <td class="text-capitalize">
                                                @{{ i.issue_date }} <br/>
                                                @{{ i.agent.full_name }}</td>
                                            <td class="text-capitalize">@{{ i.full_name }}</td>
                                            <td>@{{ i.cpr_no }}</td>
                                            {{--                                        <td>@{{ i.phone }}</td>--}}
                                            <td>@{{ i.cards.length }}</td>
                                            <td>@{{ i.email }}
                                                <br/> @{{ i.phone }}
                                            </td>
                                            <td class=" text-uppercase">

                                                <select v-model="i.status" @change="updateStatus(i.status, i)" class="form-control">
                                                    <option v-for="it in status" :value="it"> @{{ it }}</option>
                                                </select>
                                            </td>
                                            <td class="text-capitalize">@{{ i.p_name }}</td>
                                            <td>@{{ i.paid ? 'Yes' : 'No' }}</td>
                                            <td>@{{ i.expiry_date }}</td>
                                            <td>
                                                {{--                                            <a class="btn btn-warning" href="{{ route('cards.edit', i.id) }}"><i class="fa fa-edit"></i> </a>--}}
                                                <a class="btn btn-warning" :href="i.edit_url"><i class="fa fa-edit"></i> </a>
                                                <a v-if="i.paid" class="btn btn-success" :href="i.view_url">View</a>
                                                <a class="btn btn-danger" href=""><i class="fa fa-trash"></i> </a>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->


    </div>
</card-table>

@endsection

@section('js')
    <script src="{{ asset('js/dashboard.js')}}"></script>
@endsection


