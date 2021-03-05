<div class="row">
    <div class="col-md-12 pall-40 pt-20">
            {{ Form::model($envSettting, ['route'=>'envSetting','method' => 'POST','data-toggle' => 'validator', 'enctype'=> 'multipart/form-data','id' => 'configuration']) }}
        {{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
        {{ Form::hidden('type','social') }}
        <div class="row">
            @foreach($envSettting as $key => $value)
                <div class="col-md-12">
                    <h4 class="text-capitalize">{{$key}}</h4>
                    @foreach($value as $social => $social_value)
                        <?php
                            $upper_key = strtoupper($key);
                            $key_name = str_replace('_',' ',str_replace($upper_key.'_','',$social));
                        ?>
                        <div class="form-group">
                            <label for="{{$key_name}}">{{$key_name}}</label>
                            {{ Form::text($social, $social_value, ['class'=>"form-control" ,'placeholder' => $key_name]) }}
                        </div>
                    @endforeach
                </div>
            @endForeach
        </div>
        {{ Form::submit('Save Changes', ['class'=>"btn btn-md btn-primary float-md-right"]) }}
        {{ Form::close() }}
    </div>
</div>