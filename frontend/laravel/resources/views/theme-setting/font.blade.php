{{ Form::open(['method' => 'POST','route' => ['theme_setting_store'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-12 pall-40 pt-20">
        <div class="form-group">
            <label for="font_link">Font Link <span class="text-danger">*</span>
                {{-- <span class="fs-12 text-right"> <br>(Example: {{'<link href="https://fonts.googleapis.com/css?family=Poppins"> , '}} <br> {{ "<style> @import url('https://fonts.googleapis.com/css?family=Poppins'); </style>" }})</span> --}}
            </label>
            <textarea name="font" class="form-control" rows="4" required>@include('partials._dynamic_font')</textarea>
        </div>
        @foreach($font as $font_variable)
            <?php
                $variableCss = file_get_contents(public_path('css/variable.css'));
                $find_value = $font_variable.': ';
                $css_value = get_string_between($variableCss, "$find_value", ";");
            ?>
            <div class="form-group">
                <label for="font_link">Font Family <span class="text-danger">*</span> <br>
                    <span>(Example: 'Poppins', sans-serif)</span>
                </label>
                <input type="text" name="{{ $font_variable }}" value="{{ $css_value }}" required>
            </div>
        @endforeach
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-md-offset-3 col-sm-12 ">
                <button type="submit" class="btn btn-md btn-primary float-md-right">Save Changes <i class="md md-lock-open"></i></button>
            </div>
        </div>
    </div>
</div>


{{ Form::close() }}