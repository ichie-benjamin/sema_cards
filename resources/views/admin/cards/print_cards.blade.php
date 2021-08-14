<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} -  print card</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Sama Cards" name="description" />
    <style>

        .sema-card {
            border-radius: 40px;
            position:relative;
            height:340px;
            width:550px;
            margin:20px auto;
            background:#ECECEC;
            /*border-radius:4px;*/

            box-shadow:
                inset 0 0 0 1px rgba(0, 0, 0, .4),
                0 0 10px rgba(0, 0, 0, .55),
                0 2px 10px rgba(0, 0, 0, .6);
        }
        .sema-card .header {
            position:relative;
            background:#4e0b71;
            height:70px;
            /*width:100%;*/
            border-top-left-radius:40px;
            border-top-right-radius:40px;
            border-bottom:2px solid rgb(78, 11, 113);
            /*border-top:1px solid rgb(33, 2, 48);*/
            box-shadow:
                inset 0 1px 0 0 rgb(31, 3, 45),
                0 1px 2px rgba(0, 0, 0, .4)
        ;

            padding:8px 20px;
            opacity:.9;
        }
        .sema-card .foot-2{
            float : right;
        }
        .sema-card .foot{
            height: 50px;
        }
        .sema-card .foot-2 img{
            width: 100px;
            height: 100%;
            margin: 10px;
        }
        .header p {
            color: white!important;
        }
        .header h3, .header h5, .header h6 .header p {
            color: white!important;
        }
        .sema-card .body {
            padding: 10px 10px;
            height: 155px;
            background: #ccc;
        }
        .sema-card .body td {
            padding-right: 15px;
            font-size: 1.5em;
        }
        .sema-card .body .detail {
            float: left;
        }
        .sema-card .footer {

        }
        .sema-card .body .photo {
            margin-right: 25px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 150px;
            float: left;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div style="padding: 50px">

    @foreach($cards as $item)
        <div class="sema-card  page-break" style="background-image: url({{ public_path('img/bg.jpeg') }})">
            <div class="header">
                <h3>{{ $item->full_name }}</h3>
                <p>Medical Discount Program</p>
            </div>
            <div class="body">
                <div class="photo" style="width: 30%; ;background-image: url({{ public_path($item->photo) }})" >
                </div>
                <div class="detail">
                    <table>
                        <tr><td>Full name </td><td>{{ $item->full_name }}</td></tr>
                        <tr><td>Card No. </td><td>{{ number_format($item->policy_no,'0',' ',' ') }}</td></tr>
                        <tr><td>Valid till </td><td>{{ $item->expiry_date }}</td></tr>
                    </table>

                    <h4 style="margin-top: 13px">This is not an issurance card</h4>

                </div>
            </div>
            <div class="foot">
                <div class="foot-1">

                </div>
                <div class="foot-2">
                    <img src="{{ public_path('img/semalogo.png') }}" />
                </div>
            </div>


        </div>
    @endforeach

</div>
</body>

