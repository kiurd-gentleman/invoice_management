<div class="card-form">
    <div class="row no-gutters ">
        <div class="col-md-12">
            <div class="form-group required">
                <div class="w-100 h-100 p-1 bg-white">
                    <small>Header Image</small>
                    <div class="p-1 h-50  border rounded d-flex justify-content-center" style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884 ">
                        <i class="ft-upload display-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="form-group required">
{{--                <small ><a href="#">Preview</a></small>--}}
{{--                <small><a href="JavaScript:void(0)" onclick="save()">save</a></small>--}}
                <div class="w-100 h-100 p-1 bg-white">
                    <textarea name="ckeditor" id="ckeditor" cols="50" rows="30" class="ckeditor"></textarea>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group required">
                <div class="w-100 h-100 p-1 bg-white">
                    <small>Footer Image</small>
                    <div class="p-1 h-50  border rounded d-flex justify-content-center" style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884">
                        <i class="ft-upload display-4"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 text-center float-right mt-3">
            <button type="button" class="btn btn-primary save_form_button text-uppercase btn-sm btn-block">{{ __('Save') }}</button>
        </div>
    </div>
</div>

