{{ Form::open(['method' => 'POST','route' => ['theme_setting_store'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="" class="control-label text-capitalize">Custome Css</label>
            <div class="">
                <textarea type="text" name="custom[css]" class="form-control" rows="10">@include('partials._dynamic_css')</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label text-capitalize">Custome Script</label>
            <div class="">
                <textarea type="text" name="custom[script]" class="form-control" rows="10">@include('partials._dynamic_script')</textarea>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-md-offset-3 col-sm-12 ">
                <button type="submit" class="btn btn-primary btn-md float-md-right">Save Changes <i class="md md-lock-open"></i></button>
            </div>
        </div>
    </div>
</div>


{{ Form::close() }}