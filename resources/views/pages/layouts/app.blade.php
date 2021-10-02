<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('frontpage/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/icofont.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontpage/css/responsive.css') }}">
    <title>Sema Card</title>

<style>
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    /*min-width: 160px;*/
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-offset="70">

<div class="preloader-area">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 col-md-3">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="/images/s_logo.png" alt="logo"></a>
            </div>
            <div class="col-12 col-lg-8 col-md-6">
                <div class="navbar-toggle-btn">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            English
                        </button>
                        <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="http://samacardsbh.com/public/apply?lang=ar">عربي</a>
                            <a class="dropdown-item" href="http://samacardsbh.com/public/apply">English</a>

                        </div>
                    </div>

                    <ul class="navbar-nav mx-auto">
                        <form>
                            <div class="form-group col-lg-12 col-md-12">
                                <input style="background-color: #e2dded" type="email" class="form-control " id="exampleInputEmail1"  placeholder="Search Hospital, Services or Places">
                            </div>
                        </form>

{{--                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="#department">Department</a></li>--}}
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>


@yield('content')





<footer class="footer-area bg-f9faff">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <p>Copyright @ {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="go-top"><i class="icofont-stylish-up"></i></div>

<script data-cfasync="false" src="https://templates.envytheme.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>

<script src="{{ asset('frontpage/js/jquery-ui.js') }}"></script>

<script src="{{ asset('frontpage/js/popper.min.js') }}"></script>

<script src="{{ asset('frontpage/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('frontpage/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('frontpage/js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('frontpage/js/jquery.mixitup.min.js') }}"></script>

<script src="{{ asset('frontpage/js/form-validator.min.js') }}"></script>

<script src="{{ asset('frontpage/js/contact-form-script.js') }}"></script>

<script src="{{ asset('frontpage/js/main.js') }}"></script>
</body>
</html>
