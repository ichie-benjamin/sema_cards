<div class="upload-image">
   <div class="dropzone dropzone-area dz-clickable" style="width: 100%" data-input="{{ $id }}" data-preview="{{ $id }}_holder">
       <div class="dz-message lfm" data-input="{{ $id }}" data-preview="{{ $id }}_holder" >
           <br />
           <div id="{{ $id }}_holder" style="margin-top:15px; margin-bottom:20px;max-height:200px;"></div>
       </div>
       <p class="text-center text-capitalize">Choose Image </p>
   </div>
    @if (isset($image))
        <input id="{{ $id }}" class="form-control" type="hidden" value="{{ $image }}" name="{{ $field }}">
{{--        <input disabled class="form-control" value="{{ $image }}" type="text">--}}
    @else
        <input id="{{ $id }}" class="form-control" type="hidden" name="{{ $field }}">
{{--        <input disabled class="form-control" value="" type="text">--}}
    @endif
</div>



{{--//USAGE--}}
{{--@include('inc.image-upload',['field' => 'logo','image' => setting('logo'),'id' => 'logo'])--}}

