

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sama Bahrain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sama Bahrain Card">
    <meta name="keywords" content="Sama Bahrain Card">
    <meta name="author" content="Sama Bahrain Card">
    <meta name="MobileOptimized" content="320">


    <!--<script src="../applications/samacardbh/view/home/emcan/assets/website.js" type="text/javascript"></script>-->

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="/assets/css/website.css" rel="stylesheet" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="dir-ltr">
<div class="top-logo logo m-auto"></div>
<div class="progress progress-page-load">
    <div class="progress-bar bg-Kingfisher-Daisy progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
</div>

<div class="body-bg"></div>
<div class="row d-flex w-100" id="app">
    <div class="container">

        <div class="row d-flex w-100">

            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $lang == 'ar' ? 'Arabic' : 'English' }}                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('apply') }}?lang=ar" class="dropdown-item text-left" data-lang="ar">عربي</a>
                        <a href="{{ route('apply') }}" class="dropdown-item text-left" data-lang="en">English</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row d-flex w-100"></div>

        <div class="col-sm-12 col-md-12 col-lg-6 p-0 m-auto d-flex text-center">
            <div class="row d-flex w-100 align-self-center primary-links">
                @if ($lang == 'en')
                    <a href="http://samacardbh.com/downloadpdf" class="col-sm-12 col-md-6 col-lg-6 align-self-center primary-link">Hospitals Directory</a>
                    <a class="col-sm-12 col-md-5 col-lg-5 align-self-center primary-link requset-card clicked">Request Card</a>
                @else
                    <a href="https://samacardbh.net/%d9%82%d8%a7%d8%a6%d9%85%d8%a9-%d8%a7%d9%84%d9%85%d8%b3%d8%aa%d8%b4%d9%81%d9%8a%d8%a7%d8%aa-pdf/" class="col-sm-12 col-md-6 col-lg-6 align-self-center primary-link">دليل المستشفيات</a>
                    <a class="col-sm-12 col-md-5 col-lg-5 align-self-center primary-link requset-card clicked"> أطلب البطاقة</a>
                @endif
            </div>
        </div>

        <div class="row d-flex w-100"></div>

        <apply-card :p_types='@json($p_types)' lang="{{ $lang }}" post_url="{{ route('cards.online.store') }}"></apply-card>
    </div>
</div>


<footer class="site-footer "></footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/front/js/custom/popper.min.js"></script>
<script src="/front/js/bootstrap/bootstrap.min.js"></script>

<script src="/assets/js/jquery-ui.min.js"></script>


<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

<script src="{{ mix('js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
