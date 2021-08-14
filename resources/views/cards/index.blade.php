@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Cards</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('cards.card.create') }}" class="btn btn-success" title="Create New Card">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($cards) == 0)
            <div class="panel-body text-center">
                <h4>No Cards Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Cpr No</th>
                            <th>Mobile</th>
                            <th>Mobile2</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Card Type</th>
                            <th>Payment Method</th>
                            <th>Contact Method</th>
                            <th>Package Type</th>
                            <th>Comment</th>
                            <th>Period</th>
                            <th>Agent</th>
                            <th>Status</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>First Issue Date</th>
                            <th>Email</th>
                            <th>Card</th>
                            <th>Is Parent</th>
                            <th>Policy No</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cards as $card)
                        <tr>
                            <td>{{ $card->full_name }}</td>
                            <td>{{ $card->gender }}</td>
                            <td>{{ $card->cpr_no }}</td>
                            <td>{{ $card->mobile }}</td>
                            <td>{{ $card->mobile2 }}</td>
                            <td>{{ $card->phone }}</td>
                            <td>{{ $card->address }}</td>
                            <td>{{ $card->card_type }}</td>
                            <td>{{ $card->payment_method }}</td>
                            <td>{{ $card->contact_method }}</td>
                            <td>{{ $card->package_type }}</td>
                            <td>{{ $card->comment }}</td>
                            <td>{{ $card->period }}</td>
                            <td>{{ optional($card->agent)->id }}</td>
                            <td>{{ $card->status }}</td>
                            <td>{{ $card->issue_date }}</td>
                            <td>{{ $card->expiry_date }}</td>
                            <td>{{ $card->first_issue_date }}</td>
                            <td>{{ $card->email }}</td>
                            <td>{{ optional($card->card)->full_name }}</td>
                            <td>{{ ($card->is_parent) ? 'Yes' : 'No' }}</td>
                            <td>{{ $card->policy_no }}</td>

                            <td>

                                <form method="POST" action="{!! route('cards.card.destroy', $card->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('cards.card.show', $card->id ) }}" class="btn btn-info" title="Show Card">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('cards.card.edit', $card->id ) }}" class="btn btn-primary" title="Edit Card">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Card" onclick="return confirm(&quot;Click Ok to delete Card.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $cards->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection