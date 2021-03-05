{{ Form::open(['method' => 'POST','route' => ['theme_color_store'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
@foreach($color as $key => $color_name)
    <div class="col-lg-12 pl-40 pt-20 {{$color_name}}_">
        <div class="form-group {{$color_name}}">
            <div class="row">
                <label for="" class="control-label text-capitalize col-lg-4">{{str_replace('-',' ',$color_name)}}</label>
                <?php
                    $variableCss = file_get_contents(public_path('css/variable.css'));
                    $find_value = $color_name.': ';
                    $css_value = get_string_between($variableCss, "$find_value", ";");
                ?>
                @if($color_name == '--gradient-degree')
                    <input type="text" name="{{$color_name}}" class="form-control col-lg-1 {{$color_name}}" value="{{ $css_value }}">
                @elseif($color_name == 'theme-type')
                    <input type="radio" name="{{$color_name}}" class="radio no-wh mr-10 theme_color" id="Single" value="single" {{$css_value == 'single' ? 'checked' : ''}}><label for="Single">Single</label>
                    <input type="radio" name="{{$color_name}}" class="radio no-wh mr-10 theme_color" id="Gradient" value="gradient" {{$css_value == 'gradient' ? 'checked' : ''}}><label for="Gradient">Gradient</label>
                @else
                    <input type="color" name="{{$color_name}}" class="form-control col-lg-2 {{$color_name}}" value="{{ $css_value }}">
                    {{--@if(in_array($color_name,['--gradient-first-color','--gradient-second-color']))--}}
                        {{--<input type="number" name="{{$color_name}}-percentage" class="form-control col-lg-1 ml-40" placeholder="%">--}}
                    {{--@endif--}}
                @endif
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-md-offset-3 col-sm-12 ">
                <button type="submit" class="btn btn-primary btn-md float-md-right">Save Changes <i class="md md-lock-open"></i></button>
            </div>
        </div>
    </div>
</div>


{{ Form::close() }}

<script>
    color_type();
    $('.theme_color').on('change',function(){
        color_type();
    });
    function color_type(){
        var color_type = $("input[name='theme-type']:checked").val()

        if (color_type == 'single'){
            $('.--gradient-first-color_').hide();
            $('.--gradient-second-color_').hide();
            $('.--gradient-degree_').hide();
            $('.--theme-color_').show();
            $('.--theme-color').addClass('ml-40')
        }else{
            $('.--theme-color_').hide();
            $('.--gradient-first-color_').show();
            $('.--gradient-second-color_').show();
            $('.--gradient-degree_').show();
            $('.--gradient-first-color').addClass('ml-40');
            $('.--gradient-second-color').addClass('ml-40');
            $('.--gradient-degree').addClass('ml-40');
        }
    }
</script>