<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}

?>

@extends('layouts.app')

@section('content')
    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel bg-{{$bg}}">
        <div class="content bg-{{$bg}}">
            <div id="main" class="page-inner">

                <div class="mt-2 mb-4">
                    <h2 class=" pb-2">Welcome, <span class="text-{{$text}}">{{ Auth::user()->name }}</span>, Your Account ID is
                        <span class="text-{{$text}}">{{ auth()->user()->account_id }}</span></h2>

                    @if(Session::has('getAnouc') && Session::get('getAnouc') == "true" )
                        @if ($settings->enable_annoc == "on")
                            <h5 id="ann" class="text-{{$text}}op-7 mb-4">{{$settings->newupdate}}</h5>
                            <script type="text/javascript">
                                var announment = $("#ann").html();
                                console.log(announment);
                                swal({
                                    title: "Annoucement!",
                                    text: announment,
                                    icon: "info",
                                    buttons: {
                                        confirm: {
                                            text: "Okay",
                                            value: true,
                                            visible: true,
                                            className: "btn btn-info",
                                            closeModal: true
                                        }
                                    }
                                });
                            </script>
                        @endif
                        {{session()->forget('getAnouc')}}
                    @endif

                </div>
                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class=" row-card-no-pd bg-{{$bg}} shadow-lg">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="s-tab" data-toggle="tab" href="#stock" role="tab" aria-controls="profile" aria-selected="true">STOCK</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="m-tab" data-toggle="tab" href="#m_funds" role="tab" aria-controls="home" aria-selected="false">MUTUAL FUNDS</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="f-tab" data-toggle="tab" href="#fixed_deposit" role="tab" aria-controls="contact" aria-selected="false">FIXED DEPOSIT</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="f-tab" data-toggle="tab" href="#gold" role="tab" aria-controls="contact" aria-selected="false">GOLD</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stock" role="tabpanel" aria-labelledby="s-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    {{--                                        <div class="row">--}}
                                    <h2 class="text-uppercase">{{ auth()->user()->stock_1 }}</h2>
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-ZM/" rel="noopener" target="_blank"><span class="blue-text">ZM Price Today</span></a> by TradingView</div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                            {
                                                "symbol": "NASDAQ:ZM",
                                                "width": "100%",
                                                "colorTheme": "{{$bg}}",
                                                "isTransparent": false,
                                                "locale": "en"
                                            }
                                        </script>
                                    </div>
                                    <!-- TradingView Widget END -->
                                    {{--                                        </div>--}}

                                    <div class="row">

                                        <div class="col-md-6">
                                            <h3>Invested Amount</h3>
{{--                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->stock_1_amt, 2, '.', ',') }}</h4>--}}
                                            <h4 class="card-title text-{{$text}}">Closed</h4>
                                        </div>
                                        <div class="col-md-6" v-cloak>
                                            <h3>Profit Rate</h3>
                                            {{--                                                <h4 class="card-title text-{{$text}}">{{ auth()->user()->stock_1_profit }}%</h4>--}}
                                            <h4  class="card-title text-{{$text}}" :class="stock1_i > 0 ? 'text-success' : 'text-danger'" v-cloak>Closed</h4>
{{--                                            <h4  class="card-title text-{{$text}}" :class="stock1_i > 0 ? 'text-success' : 'text-danger'" v-cloak>@{{ formatPrice(stock1_i) }}%</h4>--}}
                                        </div>
                                        <div class="col-md-6" >
                                            <h3>Purchase Price</h3>
                                            <h4 class="card-title text-{{$text}}">Closed</h4>
{{--                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->stock_1_price, 2, '.', ',') }}</h4>--}}
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Closed Date/Time</h3>
{{--                                            <h3>Purchase Date/Time</h3>--}}
                                            <h4 class="card-title text-{{$text}}">{{ auth()->user()->stock_1_date }}</h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{--                                        <div class="row">--}}
                                    <h2 class="text-uppercase">{{ auth()->user()->stock_2 }}</h2>
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-INTC/" rel="noopener" target="_blank"><span class="blue-text">INTC Price Today</span></a> by TradingView</div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                            {
                                                "symbol": "NASDAQ:INTC",
                                                "width": "100%",
                                                "colorTheme": "{{$bg}}",
                                                "isTransparent": false,
                                                "locale": "en"
                                            }
                                        </script>
                                    </div>
                                    <!-- TradingView Widget END -->
                                    {{--                                        </div>--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Invested Amount</h3>
                                            {{--                                                        <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->stock_2_amt, 2, '.', ',') }}</h4>--}}
                                            <h4 class="card-title text-{{$text}}">Closed</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Profit Rate</h3>
                                            {{--                                                        <h4 class="card-title text-{{$text}}" :class="stock2_i > 0 ? 'text-success' : 'text-danger'" v-cloak>@{{ formatPrice(stock2_i) }}%</h4>--}}
                                            <h4 class="card-title text-{{$text}}">Closed</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Purchase Price</h3>
                                            <h4 class="card-title text-{{$text}}">Closed</h4>
                                            {{--                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->stock_2_price, 2, '.', ',') }}</h4>--}}
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Close Date/Time</h3>
                                            <h4 class="card-title text-{{$text}}">{{ auth()->user()->stock_2_date }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="m_funds" role="tabpanel" aria-labelledby="m-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    @if (auth()->user()->m_fund_logo)
                                        <img style="width: 100%" class="img-responsive" src="{{ asset(auth()->user()->m_fund_logo) }}">
                                    @else
                                        <img style="width: 100%" class="img-responsive" src="{{ asset('public/images/elvie_logo.svg') }}">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    @if (auth()->user()->m_fund_details)
                                        {!! auth()->user()->m_fund_details !!}
                                    @else
                                        <h4 class="card-title text-{{$text}}">Elvie is bringing women's technology out of the dark ages</h4>
                                        <strong>Our mission is to improve women's lives through smarter technology.</strong>
                                        <p>We approach problems as women and solve them as engineers, scientists and designers, starting with a real need and innovating around it.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <h3>Invested Amount</h3>
                                    <h4 class="card-title text-{{$text}}">Closed</h4>
                                    {{--                                        <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->m_fund_amt, 2, '.', ',') }}</h4>--}}
                                </div>
                                <div class="col-md-6">
                                    <h3>Expected Return</h3>
                                    <h4 class="card-title text-{{$text}}">Closed</h4>
                                    {{--                                        <h4 class="card-title text-{{$text}}">{{ auth()->user()->m_fund_profit }}%</h4>--}}
                                </div>

                            </div>

                            <hr class="row">
                            <div class="row">
                                <div class="col-md-3">
                                    @if (auth()->user()->m_fund_logo_2)
                                        <img style="width: 100%" class="img-responsive" src="{{ asset(auth()->user()->m_fund_logo_2) }}">
                                    @else
                                        <img style="width: 100%" class="img-responsive" src="{{ asset('public/images/cazoo.png') }}">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    @if (auth()->user()->m_fund_details_2)
                                        {!! auth()->user()->m_fund_details_2 !!}
                                    @else
                                        <h4 class="card-title text-{{$text}}">Cazoo</h4>
                                        <strong>We’re transforming the car buying experience
                                        </strong>
                                        <p>We want to make buying your next car no different to ordering any other product today.</p>
                                        {{--                                            <p>We approach problems as women and solve them as engineers, scientists and designers, starting with a real need and innovating around it.</p>--}}
                                    @endif
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <h3>Invested Amount</h3>
                                    {{--                                        <h4 class="card-title text-{{$text}}">{{$settings->currency}} 200,000.00</h4>--}}
                                    <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(auth()->user()->m_fund_amt_2, 2, '.', ',') }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h3>Expected Return</h3>
                                    {{--                                        <h4 class="card-title text-{{$text}}">43.00%</h4>--}}
                                    <h4 class="card-title text-{{$text}}">{{ auth()->user()->m_fund_profit_2 }}%</h4>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="fixed_deposit" role="tabpanel" aria-labelledby="f-tab">
                            <div class="row ">
                                <div class="col-md-3" >
                                    <div class="bg-{{$bg}} shadow-lg" style="padding: 20px 50px">
                                        <h3 class="card-title text-{{$text}}">6.35%</h3>
                                        <hr class="row text-{{$text}}" style="margin-top: 10px; margin-bottom: 10px" />
                                        <p class="card-title text-{{$text}}">1 Year</p>
                                    </div>
                                </div>
                                <div class="col-md-3" >
                                    <div class="bg-{{$bg}} shadow-lg" style="padding: 20px 50px">
                                        <h3 class="card-title text-{{$text}}">5.25%</h3>
                                        <hr class="row text-{{$text}}" style="margin-top: 10px; margin-bottom: 10px" />
                                        <p class="card-title text-{{$text}}">9 Months</p>
                                    </div>
                                </div>
                                <div class="col-md-3" >
                                    <div class="bg-{{$bg}} shadow-lg" style="padding: 20px 50px">
                                        <h3 class="card-title text-{{$text}}">5.25%</h3>
                                        <hr class="row text-{{$text}}" style="margin-top: 10px; margin-bottom: 10px" />
                                        <p class="card-title text-{{$text}}">6 Months</p>
                                    </div>
                                </div>
                                <div class="col-md-3" >
                                    <div class="bg-{{$bg}} shadow-lg" style="padding: 20px 50px">
                                        <h3 class="card-title text-{{$text}}">4.75%</h3>
                                        <hr class="row text-{{$text}}" style="margin-top: 10px; margin-bottom: 10px" />
                                        <p class="card-title text-{{$text}}">3 Months</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gold" role="tabpanel" aria-labelledby="f-tab">

                        </div>
                    </div>
                </div>

                <!-- Beginning of  Dashboard Stats  -->
                <div class="row row-card-no-pd bg-{{$bg}} shadow-lg">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-download text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Invested</p>
                                            @foreach($deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                    <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format($deposited->count, 2, '.', ',') }}</h4>
                                                @else
                                                    <h4 class="card-title text-{{$text}}">{{$settings->currency}}0.00</h4>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="flaticon-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Profit</p>
                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-gift text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Bonus</p>
                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}} {{ number_format($total_bonus->bonus, 2, '.', ',')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-retweet text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Ref. Bonus</p>
                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="flaticon-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Balance</p>
                                            <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</h4> <br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-envelope text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Total Plans</p>
                                            @if(count($user_plan)>0)
                                                <h4 class="card-title text-{{$text}}">{{$user_plan->count()}}</h4>
                                            @else
                                                <h4 class="card-title text-{{$text}}">0</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-envelope-open text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Active Plans</p>

                                            @if(count($user_plan_active)>0)
                                                <h4 class="card-title text-{{$text}}">{{$user_plan_active->count()}}</h4>
                                            @else
                                                <h4 class="card-title text-{{$text}}">0</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-box text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Total Package</p>
                                            <h4 class="card-title text-{{$text}}">{{ auth()->user()->t_package }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-box-open text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Active Package</p>
                                            <h4 class="card-title text-{{$text}}">{{ auth()->user()->a_package }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round bg-{{$bg}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center icon-big">
                                            <i class="fa fa-envelope text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Withdrawal</p>
                                            @if (auth()->user()->withdrawal)
                                                <h4 class="card-title text-{{$text}}">{{ auth()->user()->withdrawal }}</h4>
                                            @else
                                                <h4 class="card-title text-{{$text}}">$35,000.00</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endsection

            @section('js')
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        let stock1_v = "{{ auth()->user()->stock_1_price }}"
                        let stock2_v = "{{ auth()->user()->stock_2_price }}"
                        new Vue({
                            el: '#main',
                            data: {
                                stock2_i : 0, stock1_i : 0, stock1 : 'ZM', stock2 : 'INTC', stock1_v : stock1_v, stock2_v : stock2_v,
                            },
                            mounted() {
                                this.getStocks();
                                this.timer = setInterval(() => {
                                    this.getStocks()
                                }, 60000)
                            },
                            methods: {
                                getStocks(){
                                    this.getFirst();
                                    this.getSecond();
                                },
                                formatPrice(value) {
                                    let val = (value/1).toFixed(2).replace('.', '.')
                                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                },
                                getFirst(){
                                    axios.get('https://financialmodelingprep.com/api/v3/profile/'+this.stock1+'?apikey=6e39eba411ee51caced6ab2be49f987b').then((response) => {
                                        let mkp = response.data[0].price;
                                        let difInRate = (mkp - this.stock1_v) / this.stock1_v;
                                        this.stock1_i = difInRate * 100;
                                    });
                                },
                                getSecond(){
                                    axios.get('https://financialmodelingprep.com/api/v3/profile/'+this.stock2+'?apikey=6e39eba411ee51caced6ab2be49f987b').then((response) => {
                                        let mkp2 = response.data[0].price;
                                        let difInRate2 = (mkp2 - this.stock2_v) / this.stock2_v;
                                        this.stock2_i = difInRate2 * 100;
                                    });
                                }
                            },
                            computed: {
                                priceInCoin(){
                                    let newAmt = 0
                                    if(this.amt > 0 && this.coinPrice > 0){
                                        newAmt = this.amt / this.coinPrice;
                                    }
                                    return newAmt;
                                },
                            }
                        })
                    })
                </script>
@endsection

