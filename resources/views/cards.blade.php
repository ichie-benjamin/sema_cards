@extends('layouts.frontend')
@section('content')
    <div class="wrapper" id="app">


        <section class="module divider-bottom" id="search" style="margin-top: 70px">
            <div class="container">

                <div class="row" >
                    <div class="col-md-6 mx-auto">
                        <div class="sema-card" style="background-image: url('/images/card.jpeg')">
                            <div class="row">
                                <div class="col-4 mx-auto text-center" >
                                    @if ($card->photo)
                                        <div class="photo" style="width: 100%;">
                                            <img style="max-height: 160px" src="{{ $card->photo }}" />
                                        </div>
                                    @endif
                                </div>
                                <div class="col-8">
                                    <table>
                                        <tr><td>Name </td><td style="text-transform: capitalize">:{{ $card->full_name }}</td></tr>
                                        <tr><td>CPR </td><td>:{{ $card->cpr_no }}</td></tr>
                                        <tr><td>ID No. </td><td>:{{ $card->policy_no }}</td></tr>
                                        <tr><td>Valid till </td><td>:{{ $card->expiry_date }}</td></tr>
                                    </table>
                                    <h4 style="margin-top: 10px"><strong>This is Not Insurance Card</strong></h4>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-6 mx-auto">
                        <a href="{{ route('online.card', $card->policy_no) }}?download&no_design" class="btn btn-outline-success" >Print Plain</a>
                        <a href="{{ route('online.card', $card->policy_no) }}?download"  class="btn btn-success" >Print With Design</a>
                        <a href="{{ route('online.card', $card->policy_no) }}?email"  class="btn btn-warning" >Email</a>
                    </div>
                </div>

            </div>
        </section>

    <!-- Footer-->
        <footer class="footer">

            <div class="footer-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>For more information please contact us on 77690000 or whatsapp 37749339</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end-->
    </div>
@endsection
