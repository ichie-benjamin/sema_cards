@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($packageType->name) ? $packageType->name : 'Package Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('package_types.package_type.destroy', $packageType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('package_types.package_type.index') }}" class="btn btn-primary" title="Show All Package Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('package_types.package_type.create') }}" class="btn btn-success" title="Create New Package Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('package_types.package_type.edit', $packageType->id ) }}" class="btn btn-primary" title="Edit Package Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Package Type" onclick="return confirm(&quot;Click Ok to delete Package Type.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $packageType->name }}</dd>
            <dt>Price</dt>
            <dd>{{ $packageType->price }}</dd>

        </dl>

    </div>
</div>

@endsection