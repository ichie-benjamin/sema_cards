@if(Session::has('success_message'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}

            </div>
        </div>

    </div>

@endif

@if(Session::has('error_message'))
    <div class="row">
        <div class="col-12">
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('error_message') !!}
        </div>
        </div>
    </div>

@endif
