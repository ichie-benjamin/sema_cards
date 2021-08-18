@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Create New Card</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ env('APP_NAME') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Cards</a></li>
                                <li class="breadcrumb-item active">Add new</li>
                            </ol>
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
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.msg.error')


                <edit-card :card_data='@json($card)' :members='@json($members)' :p_methods='@json($p_methods)'
                           :status='@json($status)' url="{{ route('cards.update', $card->id) }}" view_card="{{ route('cards', $card->policy_no) }}"
                           send_mail="{{ route('send.email.cards') }}"
                           post_url="{{ route('cards.store') }}" :p_types='@json($p_types)' :card_types='@json($card_types)'
                           :con_methods='@json($con_methods)'></edit-card>

                <!--end card-->
            </div>
        </div>


    </div>
@endsection





