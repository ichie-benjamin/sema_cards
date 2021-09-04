<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="/front/images/favicon.png">
    <link rel="apple-touch-icon" href="/front/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/front/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/front/images/apple-touch-icon-114x114.png">
    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Plugins-->
    <link href="/front/css/plugins.min.css" rel="stylesheet">
    <!-- Template core CSS-->
    <link href="/front/css/template.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .sema-card {
            /*border-radius: 40px;*/
            background-color: white;
            background-position: center !important;
            background-size: cover!important;
            background-repeat: no-repeat;
            position:relative;
            height:350px;
            width:550px;
            margin:20px auto;
            padding-top: 90px;
        }

        .sema-card td {

            font-weight: 500!important;
            font-size: 1.25em;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

    </style>

</head>
<body>

<!-- Preloader-->
<div class="page-loader">
    <div class="page-loader-inner">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Preloader end-->

<!-- Header-->
<header class="header">
    <div class="container-fluid">
        <!-- Brand-->
        <div class="inner-header"><a class="inner-brand" href="{{ route('check') }}">
                <img width="100" height="60" src="/images/s_logo.png" />
            </a></div>
        <!-- Navigation-->
        <div class="inner-navigation collapse">
            <div class="inner-nav">
                <ul>
                    <li class=""><a href="#">
                            <span class="menu-item-span">
                                                <img width="100" height="60" src="/images/m_logo.png" />
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="extra-nav">
            <ul>
                <li><a class="off-canvas-open" href="#"><span class="menu-item-span"><i class="ti-menu"></i></span></a></li>
                <li class="nav-toggle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="menu-item-span"><i class="ti-menu"></i></span></a></li>
            </ul>
        </div>
    </div>
</header>
<!-- Header end-->

<!-- Wrapper-->

@yield('content')


<!-- Wrapper end-->
<!-- Off canvas-->
<div class="off-canvas-sidebar">
    <div class="off-canvas-sidebar-wrapper">
        <div class="off-canvas-header"><a class="off-canvas-close" href="#"><span class="ti-close"></span></a></div>
        <div class="off-canvas-content">
            <!-- Text widget-->
            <aside class="widget widget-text">
                <div class="textwidget">
                    <p class="text-center"><img src="/images/l_logo.png" alt="" ></p>
                </div>
            </aside>
        </div>
    </div>
</div>
<!-- Off canvas end-->

<!-- To top button--><a class="scroll-top" href="#top"><i class="fas fa-angle-up"></i></a>


<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

<!-- Scripts-->
<script src="/front/js/custom/jquery.min.js"></script>
<script src="/front/js/custom/popper.min.js"></script>
<script src="/front/js/bootstrap/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0rANX07hh6ASNKdBr4mZH0KZSqbHYc3Q"></script>
<script src="/front/js/custom/plugins.min.js"></script>
<script src="/front/js/custom/custom.min.js"></script>

<script src="{{ mix('js/app.js') }}"></script>


<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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






<script>
    $('.lfm').filemanager('image');
</script>
</body>
</html>
