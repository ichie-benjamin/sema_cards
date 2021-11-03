<div class="modal fade" id="editService{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editService{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Editing {{ $item->name }}</h6>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="card-body p-0">
                    <form action="{{ route('service.update', $item->id) }}" method="POST" class="form-parsley">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <input name="hospital_cr" type="hidden" value="{{ $item->hospital_cpr_no }}">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group "><label>Service In English</label>
                                    <input required value="{{ $item->name }}" name="name" type="text" class="form-control" placeholder="name" />
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Service In Arabic</label>
                                    <input value="{{ $item->ar_name }}" name="ar_name" type="text" class="form-control" placeholder="arabic" />
                                    {!! $errors->first('ar_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Price </label>
                                    <input required name="price" step="any"  value="{{ old('price', $item->price) }}" type="number" class="form-control" placeholder="enter price" />
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Discount </label>
                                    <input  name="discount" step="any"  value="{{ old('discount', $item->discount) }}" type="number" class="form-control" placeholder="enter discount" />
                                    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>


                            <div class="col-12">
                                <button  class="btn btn-primary" type="submit">Update Service</button>
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

<div class="modal fade" id="editContact{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editContact{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Editing {{ $item->name }}</h6>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="card-body p-0">
                    <form action="{{ route('contact.update', $item->id) }}" method="POST" class="form-parsley">
                        {{ csrf_field() }}
{{--                        <input name="_method" type="hidden" value="PUT">--}}
                        <input name="hospital_id" type="hidden" value="{{ $item->hospital_id }}">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group "><label>Name : </label>
                                    <input required value="{{ $item->name }}" name="name" type="text" class="form-control" placeholder="name" />
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Position</label>
                                    <input value="{{ $item->position }}" name="position" type="text" class="form-control" placeholder="position" />
                                    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Mobile</label>
                                    <input value="{{ $item->mobile }}" name="mobile" type="text" class="form-control" placeholder="mobile" />
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                                    <div class="col-12">
                                <div class="form-group "><label>Email</label>
                                    <input value="{{ $item->email }}" name="email" type="text" class="form-control" placeholder="email" />
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="col-12">
                                <button  class="btn btn-primary" type="submit">Update Service</button>
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
