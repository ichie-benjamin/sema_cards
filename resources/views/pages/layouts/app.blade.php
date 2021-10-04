<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swasthya | Medical and Health HTML template</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link href="{{ asset('frontpage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontpage/css/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontpage/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontpage/css/plugin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontpage/fonts/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src='/cdn-cgi/challenge-platform/h/g/scripts/invisible.js'></script>
</head>

<body>
<div id="preloader">
    <div id="status"></div>
</div>
<header class="main_header_area">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="contact-info">
                    <p><i class="fa fa-phone" aria-hidden="true"></i> 123-456-79459</p>
{{--                    <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7b12151d143b080c1a080f13021a55181416">[email&#160;protected]</a></p>--}}
                </div>
                <div class="header-links">
                    <ul>
{{--                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header_menu affix-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}"> <img height="90" src="{{ asset('frontpage/logo_t.png') }}" alt="logo1"> <img src="{{ asset('images/s_logo.png') }}" alt="logo1"> </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="responsive-menu">

                        <li >
                            <a href="{{ route('home') }}" >
                               Home
                            </a>

                        </li>
                        <li >
                            <a href="{{ route('partner') }}" >
                                Be A Partner
                            </a>

                        </li>
                        <li >
                            <a href="{{ route('about') }}" >
                                About Us
                            </a>

                        </li>
                        <li >
                            <a href="{{ route('contact') }}" >
                                Contact Us
                            </a>

                        </li>




{{--                        <li class="dropdown submenu"> <a href="#search1" class="mt_search"><i class="fa fa-search"></i></a> </li>--}}
                    </ul>
                </div>
            </div>
            <div id="slicknav-mobile"></div>
        </nav>
    </div>
</header>



@yield('content')



<footer>
    <div class="container">
        <div class="f-contact mar-bottom-50">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="f-contact-inner">
                        <div class="contact-icon"> <i class="fa fa-phone"></i> </div>
                        <div class="contact-title"> <span class="white">+123-456-79459</span> <span class="white">Have a question? call us now</span> </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="f-contact-inner">
                        <div class="contact-icon"> <i class="fa fa-envelope-o"></i> </div>
                        <div class="contact-title"> <span class="white"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e980878f86a99a9e889a9d819088c78a8684">[email&#160;protected]</a></span> <span class="white">Need support? Drop us an email</span> </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="f-contact-inner">
                        <div class="contact-icon"> <i class="fa fa-clock-o"></i> </div>
                        <div class="contact-title"> <span class="white">323 Wintergreen, NJ 07631, USA</span> <span class="white">You can find here</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <div class="lower-footer pad-bottom-50">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="footer-contact mar-right-15">
                            <div class="footer-logo text-center mar-bottom-15"> <img src="images/logo.png" alt="Image"> </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                <br>
                                <br> We are among the most qualified implant providers in the AUS with over 30 years of quality training and experience.</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="departments">
                            <h3>Departments</h3>
                            <ul>
                                <li><a href="#">Radiology</a></li>
                                <li><a href="#">Pedodontics</a></li>
                                <li><a href="#">Pedodontics</a></li>
                                <li><a href="#">Dental Implants</a></li>
                                <li><a href="#">Oral & Maxsillosacial</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="facility">
                            <h3>Facilities</h3>
                            <ul>
                                <li><a href="#">Blood Bank</a></li>
                                <li><a href="#">Intensive Care Unit</a></li>
                                <li><a href="#">Laboratories</a></li>
                                <li><a href="#">Tooth Care</a></li>
                                <li><a href="#">Scale and Clean</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-5 col-xs-12">
                        <div class="work-time">
                            <h3>Work Time</h3>
                            <ul>
                                <li>Monday<span>10 AM - 3 PM</span></li>
                                <li>Tuesday<span>11 AM - 2 PM</span></li>
                                <li>Wednesday<span>10 AM - 3:30 PM</span></li>
                                <li>Thursday<span>9 AM - 2 PM</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright © 2019 Swasthye by <a href="https://www.cyclonethemes.com" target="_blank">Cyclone Themes</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div id="back-to-top">
    <a href="#"></a>
</div>
<div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('frontpage/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontpage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontpage/js/plugin.js') }}"></script>
<script src="{{ asset('frontpage/js/main.js') }}"></script>
<script src="{{ asset('frontpage/js/custom-lightbox.js') }}"></script>
<script src="{{ asset('frontpage/js/custom-nav.js') }}"></script>
<script type="text/javascript">
    (function() {
        window['__CF$cv$params'] = {
            r: '69860235dc4c16e6',
            m: 'C9mnjHTL.FQhkbtfWBAGf_g1l8OHDsK5aS5dfH6M0eg-1633262411-0-Ace11aODZev1E512NwqEP5z9Q2VaS9GkcAw++lJCYg2luWO/Ul7iYdgOa3Vu2AwqOF155YjjeuiwDPtprh1YeizJaIBpR26+gT1g2jYwtVS7fqVUzqS7y6aU+ProTi+fcA==',
            s: [0x31b8b779d6, 0x837fd9727d],
            u: '/cdn-cgi/challenge-platform/h/g'
        }
    })();
</script>
</body>

</html>
