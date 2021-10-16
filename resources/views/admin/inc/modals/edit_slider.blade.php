<div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Editing {{ $item->head_en }}</h6>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="card-body p-0">
                    <form action="{{ route('sliders.update', $item->id) }}" method="POST" class="form-parsley">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group "><label>Heading In English</label>
                                    <input required value="{{ $item->head_en }}" name="head_en" type="text" class="form-control" placeholder="head_en" />
                                    {!! $errors->first('head_en', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Heading In Arabic</label>
                                    <input value="{{ $item->head_ar }}" name="ar" type="text" class="form-control" placeholder="arabic" />
                                    {!! $errors->first('head_ar', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group "><label>Sub Heading In English</label>
                                    <input required name="sub_head_en" value="{{ $item->sub_head_en }}" type="text" class="form-control" placeholder="sub_head_en" />
                                    {!! $errors->first('sub_head_en', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group "><label>Sub Heading In Arabic</label>
                                    <input value="{{ $item->sub_head_ar }}" name="sub_head_ar" type="text" class="form-control" placeholder="sub_head_en" />
                                    {!! $errors->first('sub_head_ar', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group "><label>Image </label>
                                    @include('admin.inc.image-upload',['field' => 'img','id' => 'Image'])
                                </div>
                            </div>

                            <div class="col-12">
                                <button  class="btn btn-primary" type="submit">Save Slider</button>
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
