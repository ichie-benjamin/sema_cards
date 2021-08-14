<div class="modal fade" id="editAgent{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editAgent{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Editing {{ $item->full_name }}</h6>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="card-body p-0">
                    <form action="{{ route('agent.update', $item->id) }}" method="POST" class="form-parsley">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group "><label>Full name</label>
                                    <input required value="{{ old('full_name',$item->full_name) }}" name="full_name" type="text" class="form-control" placeholder="Full name" />
                                    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Email Address</label>
                                    <input required name="email"  value="{{ old('email', $item->email) }}" type="text" class="form-control" placeholder="Email Address" />
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Username</label>
                                    <input required name="username"  value="{{ old('username',$item->username) }}" type="text" class="form-control" placeholder="Username" />
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Phone</label>
                                    <input required name="phone"  value="{{ old('phone',$item->phone) }}" type="text" class="form-control" placeholder="phone" />
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Password (leave empty to retain old password)</label>
                                    <input name="password"  value="" type="text" class="form-control" placeholder="password" />
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>

                            <div class="col-12">
                                <button  class="btn btn-primary" type="submit">Update Agent</button>
                            </div>
                        </div>

                        <!--end form-group-->
                    </form>
                </div>
            </div>
            <!--end modal-body-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
