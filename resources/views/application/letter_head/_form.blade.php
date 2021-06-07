<div class="card-form">
    <div class="row no-gutters ">
        <div class="col-md-12">
            <div class="form-group required">
                <div class="w-100 h-100 p-1 bg-white">
                    <small>Header Image</small>
                    <div class="p-1 w-100 h-50  border rounded d-flex justify-content-center"  id="input_image"  style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884 ">
                        <i class="ft-upload display-1" id="icon"></i>
                        <img src="{{($letter_head->header_image)}}" id="show_header_image" class="p-1" style="display: none; height: 85px; width: 100%">
                    </div>
                    <input id="header_image" type="file" name="header_image" style="display: none!important;" />
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="form-group required">
{{--                <small ><a href="#">Preview</a></small>--}}
{{--                <small><a href="JavaScript:void(0)" onclick="save()">save</a></small>--}}
                <div class="w-100 h-100 p-1 bg-white">
                    <textarea name="text" id="ckeditor" cols="50" rows="30" class="ckeditor">{{$letter_head->text}}</textarea>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group required">
                <div class="w-100 h-100 p-1 bg-white">
                    <small>Footer Image</small>
                    <div class="p-1 h-50  border rounded d-flex justify-content-center"  id="footer_input_image" style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884">
                        <i class="ft-upload display-4" id="footer_icon"></i>
                        <img src="{{$letter_head->footer_image}}" id="show_footer_image" class="p-1" style="display: none; height: 60px; width: 100%">
                    </div>
                    <input id="footer_image" type="file" name="footer_image" style="display: none!important;" />
                </div>
            </div>
        </div>
        <div class="col-12 text-center float-right mt-3">
            <button type="button" class="btn btn-primary save_form_button text-uppercase btn-sm btn-block">{{ __('Save') }}</button>
        </div>
    </div>
</div>

