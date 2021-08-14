
<div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
    <label for="full_name" class="col-md-2 control-label">Full Name</label>
    <div class="col-md-10">
        <input class="form-control" name="full_name" type="text" id="full_name" value="{{ old('full_name', optional($card)->full_name) }}" minlength="1" placeholder="Enter full name here...">
        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
    <label for="gender" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">
        <input class="form-control" name="gender" type="text" id="gender" value="{{ old('gender', optional($card)->gender) }}" minlength="1" placeholder="Enter gender here...">
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cpr_no') ? 'has-error' : '' }}">
    <label for="cpr_no" class="col-md-2 control-label">Cpr No</label>
    <div class="col-md-10">
        <input class="form-control" name="cpr_no" type="text" id="cpr_no" value="{{ old('cpr_no', optional($card)->cpr_no) }}" minlength="1" placeholder="Enter cpr no here...">
        {!! $errors->first('cpr_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
    <label for="mobile" class="col-md-2 control-label">Mobile</label>
    <div class="col-md-10">
        <input class="form-control" name="mobile" type="text" id="mobile" value="{{ old('mobile', optional($card)->mobile) }}" minlength="1" placeholder="Enter mobile here...">
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mobile2') ? 'has-error' : '' }}">
    <label for="mobile2" class="col-md-2 control-label">Mobile2</label>
    <div class="col-md-10">
        <input class="form-control" name="mobile2" type="text" id="mobile2" value="{{ old('mobile2', optional($card)->mobile2) }}" minlength="1" placeholder="Enter mobile2 here...">
        {!! $errors->first('mobile2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($card)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($card)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('card_type') ? 'has-error' : '' }}">
    <label for="card_type" class="col-md-2 control-label">Card Type</label>
    <div class="col-md-10">
        <input class="form-control" name="card_type" type="text" id="card_type" value="{{ old('card_type', optional($card)->card_type) }}" minlength="1" placeholder="Enter card type here...">
        {!! $errors->first('card_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
    <label for="payment_method" class="col-md-2 control-label">Payment Method</label>
    <div class="col-md-10">
        <input class="form-control" name="payment_method" type="text" id="payment_method" value="{{ old('payment_method', optional($card)->payment_method) }}" minlength="1" placeholder="Enter payment method here...">
        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_method') ? 'has-error' : '' }}">
    <label for="contact_method" class="col-md-2 control-label">Contact Method</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_method" type="text" id="contact_method" value="{{ old('contact_method', optional($card)->contact_method) }}" minlength="1" placeholder="Enter contact method here...">
        {!! $errors->first('contact_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('package_type') ? 'has-error' : '' }}">
    <label for="package_type" class="col-md-2 control-label">Package Type</label>
    <div class="col-md-10">
        <input class="form-control" name="package_type" type="number" id="package_type" value="{{ old('package_type', optional($card)->package_type) }}" placeholder="Enter package type here...">
        {!! $errors->first('package_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <label for="comment" class="col-md-2 control-label">Comment</label>
    <div class="col-md-10">
        <input class="form-control" name="comment" type="text" id="comment" value="{{ old('comment', optional($card)->comment) }}" minlength="1" placeholder="Enter comment here...">
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('period') ? 'has-error' : '' }}">
    <label for="period" class="col-md-2 control-label">Period</label>
    <div class="col-md-10">
        <input class="form-control" name="period" type="text" id="period" value="{{ old('period', optional($card)->period) }}" minlength="1" placeholder="Enter period here...">
        {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('agent_id') ? 'has-error' : '' }}">
    <label for="agent_id" class="col-md-2 control-label">Agent</label>
    <div class="col-md-10">
        <select class="form-control" id="agent_id" name="agent_id">
        	    <option value="" style="display: none;" {{ old('agent_id', optional($card)->agent_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter agent here...</option>
        	@foreach ($agents as $key => $agent)
			    <option value="{{ $key }}" {{ old('agent_id', optional($card)->agent_id) == $key ? 'selected' : '' }}>
			    	{{ $agent }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('agent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($card)->status) }}" minlength="1" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('issue_date') ? 'has-error' : '' }}">
    <label for="issue_date" class="col-md-2 control-label">Issue Date</label>
    <div class="col-md-10">
        <input class="form-control" name="issue_date" type="text" id="issue_date" value="{{ old('issue_date', optional($card)->issue_date) }}" placeholder="Enter issue date here...">
        {!! $errors->first('issue_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }}">
    <label for="expiry_date" class="col-md-2 control-label">Expiry Date</label>
    <div class="col-md-10">
        <input class="form-control" name="expiry_date" type="text" id="expiry_date" value="{{ old('expiry_date', optional($card)->expiry_date) }}" placeholder="Enter expiry date here...">
        {!! $errors->first('expiry_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('first_issue_date') ? 'has-error' : '' }}">
    <label for="first_issue_date" class="col-md-2 control-label">First Issue Date</label>
    <div class="col-md-10">
        <input class="form-control" name="first_issue_date" type="text" id="first_issue_date" value="{{ old('first_issue_date', optional($card)->first_issue_date) }}" placeholder="Enter first issue date here...">
        {!! $errors->first('first_issue_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($card)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('card_id') ? 'has-error' : '' }}">
    <label for="card_id" class="col-md-2 control-label">Card</label>
    <div class="col-md-10">
        <select class="form-control" id="card_id" name="card_id">
        	    <option value="" style="display: none;" {{ old('card_id', optional($card)->card_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select card</option>
        	@foreach ($cards as $key => $card)
			    <option value="{{ $key }}" {{ old('card_id', optional($card)->card_id) == $key ? 'selected' : '' }}>
			    	{{ $card }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('card_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_parent') ? 'has-error' : '' }}">
    <label for="is_parent" class="col-md-2 control-label">Is Parent</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_parent_1">
            	<input id="is_parent_1" class="" name="is_parent" type="checkbox" value="1" {{ old('is_parent', optional($card)->is_parent) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_parent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('policy_no') ? 'has-error' : '' }}">
    <label for="policy_no" class="col-md-2 control-label">Policy No</label>
    <div class="col-md-10">
        <input class="form-control" name="policy_no" type="text" id="policy_no" value="{{ old('policy_no', optional($card)->policy_no) }}" minlength="1" placeholder="Enter policy no here...">
        {!! $errors->first('policy_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

