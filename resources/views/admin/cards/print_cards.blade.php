<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} -  print card</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Sama Cards" name="description" />
    <style>


        .sema-card {
            /*border-radius: 40px;*/
            background-color: transparent;
            background-position: center !important;
            background-size: cover!important;
            background-repeat: no-repeat;
            position:fixed;
            height:350px;
            width:550px;
            /*margin:20px auto;*/
        }
        .sema-card .header {
            height:60px;
            width:100%;
            padding:4px 20px;
        }
        .sema-card .body {
            padding: 17px 1px;
            height: 160px;
            /*background: #ccc;*/
        }
        .sema-card .body td {
            /*padding-right: 5px;*/
            font-weight: 500!important;
            font-size: 1.25em;
            max-width: 270px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .sema-card .body h3 {
            /*padding-right: 5px;*/
            font-weight: 800!important;

            font-size: 1.55em;
        }
        .sema-card .body .detail {
            float: left;
        }

        .sema-card .body .photo {
            margin-right: 7px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            float: left;
        }
        .page-break {
            @if(count($cards) > 1)
            page-break-after: always;
            @endif
        }
    </style>
</head>
<body>
<div>
    @foreach($cards as $item)
        @if ($design)
            <div class="sema-card {{ $loop->index+1 < count($cards) ? 'page-break' : '' }} " style="background-image: url({{ public_path('images/card2.jpeg') }})">
                @else
                    <div class="sema-card page-break">
                        @endif
                        <div class="header">

                        </div>
                        <div class="body">

                            <div class="photo" style="width: 27%; ;background-image: url({{ $item->photo }})"></div>
                            <div class="detail">
                                <table>
                                    <tr><td>Name </td><td style="text-transform: capitalize">: {{ $item->full_name }}</td></tr>
                                    <tr><td>CPR No.</td><td>: {{ $item->cpr_no }}</td></tr>
                                    <tr><td>ID No. </td><td>: {{ number_format($item->policy_no,'0',' ',' ') }}</td></tr>
                                    <tr><td>Valid till </td><td>: {{ $item->expiry_date }}</td></tr>
                                </table>

                                <h3 style="margin-top: 10px">This is Not Insurance Card</h3>

                            </div>

                        </div>
                    </div>
                    @endforeach


            </div>
</div>
</body>

</html>
