@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Card' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('cards.card.destroy', $card->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cards.card.index') }}" class="btn btn-primary" title="Show All Card">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cards.card.create') }}" class="btn btn-success" title="Create New Card">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cards.card.edit', $card->id ) }}" class="btn btn-primary" title="Edit Card">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Card" onclick="return confirm(&quot;Click Ok to delete Card.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Full Name</dt>
            <dd>{{ $card->full_name }}</dd>
            <dt>Gender</dt>
            <dd>{{ $card->gender }}</dd>
            <dt>Cpr No</dt>
            <dd>{{ $card->cpr_no }}</dd>
            <dt>Mobile</dt>
            <dd>{{ $card->mobile }}</dd>
            <dt>Mobile2</dt>
            <dd>{{ $card->mobile2 }}</dd>
            <dt>Phone</dt>
            <dd>{{ $card->phone }}</dd>
            <dt>Address</dt>
            <dd>{{ $card->address }}</dd>
            <dt>Card Type</dt>
            <dd>{{ $card->card_type }}</dd>
            <dt>Payment Method</dt>
            <dd>{{ $card->payment_method }}</dd>
            <dt>Contact Method</dt>
            <dd>{{ $card->contact_method }}</dd>
            <dt>Package Type</dt>
            <dd>{{ $card->package_type }}</dd>
            <dt>Comment</dt>
            <dd>{{ $card->comment }}</dd>
            <dt>Period</dt>
            <dd>{{ $card->period }}</dd>
            <dt>Agent</dt>
            <dd>{{ optional($card->agent)->id }}</dd>
            <dt>Status</dt>
            <dd>{{ $card->status }}</dd>
            <dt>Issue Date</dt>
            <dd>{{ $card->issue_date }}</dd>
            <dt>Expiry Date</dt>
            <dd>{{ $card->expiry_date }}</dd>
            <dt>First Issue Date</dt>
            <dd>{{ $card->first_issue_date }}</dd>
            <dt>Email</dt>
            <dd>{{ $card->email }}</dd>
            <dt>Card</dt>
            <dd>{{ optional($card->card)->full_name }}</dd>
            <dt>Is Parent</dt>
            <dd>{{ ($card->is_parent) ? 'Yes' : 'No' }}</dd>
            <dt>Policy No</dt>
            <dd>{{ $card->policy_no }}</dd>

        </dl>

    </div>
</div>

@endsection