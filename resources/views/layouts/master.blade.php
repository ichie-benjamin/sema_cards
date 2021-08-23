<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} -  @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Sama Cards" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
    <!-- jvectormap -->
    <link href="https://mannatthemes.com/dastyle/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="https://mannatthemes.com/dastyle/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .help-block {
            color: red!important;
        }
        body.dark-sidenav .left-sidenav {
            background-color: #4e0b71!important;
        }
        .left-sidenav-menu .menu-label {
            color: #fff;
        }
        body.dark-sidenav .left-sidenav-menu li>a {
            color: #fff;
        }
    </style>

    <style>
        .upload-image .dropzone {
            min-height: 150px;
            border: 2px dashed #000;
            background: #f8f8f8;
        }
        .dropzone {
            position: relative;
        }
        .dropzone .dz-message {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>

    @yield('styles')
</head>
<body class="dark-sidenav">


@include('admin.partials.sidebar')


<div class="page-wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="dropdown hide-phone">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="search" class="topbar-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg p-0">
                        <!-- Top Search Bar -->
                        <div class="app-search-topbar">
                            <form action="#" method="get">
                                <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text..." /> <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </li>
                @section('hide')
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="align-self-center topbar-icon"></i> <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">
                        <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">Notifications <span class="badge badge-primary badge-pill">2</span></h6>
                        <div class="notification-menu" data-simplebar>
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">2 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary"><i data-feather="shopping-cart" class="align-self-center icon-xs"></i></div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item--><!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">10 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary"><img src="/assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle" /></div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Meeting with designers</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item--><!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">40 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary"><i data-feather="users" class="align-self-center icon-xs"></i></div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item--><!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">1 hr ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary"><img src="/assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle" /></div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item--><!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">2 hrs ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary"><i data-feather="check-circle" class="align-self-center icon-xs"></i></div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Payment Successfull</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a>
                    </div>
                </li>
                @endsection
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="ml-1 nav-user-name hidden-sm">{{ auth()->user()->username }}</span> <img src="/images/avatar.png" alt="profile-user" class="rounded-circle" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
            <!--end topbar-nav-->
            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile"><i data-feather="menu" class="align-self-center topbar-icon"></i></button>
                </li>
                <li class="creat-btn">
                    <div class="nav-link">
                        <a class="btn btn-sm btn-soft-primary" href="{{ route('cards.create') }}" role="button"><i class="fas fa-plus mr-2"></i>New Card</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End --><!-- Page Content-->
    <div class="page-content" id="app">

        @yield('content')

        <!-- container -->
        <footer class="footer text-center text-sm-left">
            &copy; {{ date('Y') }} {{ env('APP_NAME') }} <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by {{ env('APP_NAME') }}</span>
        </footer>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>


<!-- end page-wrapper --><!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/metismenu.min.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/feather.min.js"></script>
<script src="/assets/js/simplebar.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/moment.js"></script>
<script src="https://mannatthemes.com/dastyle/plugins/daterangepicker/daterangepicker.js"></script>
{{--<script src="https://mannatthemes.com/dastyle/plugins/apex-charts/apexcharts.min.js"></script>--}}
{{--<script src="https://mannatthemes.com/dastyle/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>--}}
{{--<script src="https://mannatthemes.com/dastyle/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>--}}
<script src="/assets/pages/jquery.analytics_dashboard.init.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>


{{--<script src="/js/app.js"></script>--}}


<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

<script src="{{ mix('js/app.js') }}"></script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    $('.lfm').filemanager('image');
</script>

@if(Session::has('error_message'))
    <script>
        toastr.error("{!! session('error_message') !!}")
    </script>
    @endif

@if(Session::has('success_message'))
    <script>
        toastr.success("{!! session('success_message') !!}")
    </script>
@endif

@if ($errors->any())
    <script>
        toastr.error('An error prevented your form from saving')
    </script>
    @endif



@yield('js')
</body>
</html>
