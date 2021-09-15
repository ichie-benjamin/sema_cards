<div class="modal fade" id="editPack{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editPack{{ $item->id }}" aria-hidden="true">
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
                    <form action="{{ route('p_types.update', $item->id) }}" method="POST" class="form-parsley">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group "><label>Name</label>
                                    <input required value="{{ $item->name }}" name="name" type="text" class="form-control" placeholder="name" />
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Price </label>
                                    <input required name="price" step="any"  value="{{ old('price', $item->price) }}" type="number" class="form-control" placeholder="enter price" />
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>

                            <div class="col-12 {{ $errors->has('show_online') ? 'has-error' : '' }}">
                                <label for="price" class="form-group">Show online</label>
{{--                                <div class="col-md-12">--}}
                                    <select name="show_online" class="form-control">
                                        <option {{ old('show_online', optional($item)->show_online)  == 1 ? 'selected' : ''}} value="1" >Yes</option>
                                        <option {{ old('show_online', optional($item)->show_online) == 1 ? ' ' : 'selected' }} value="0">No</option>
                                    </select>
{{--                                </div>--}}
                            </div>

                            <div class="col-12">
                                <button  class="btn btn-primary" type="submit">Save Package</button>
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
