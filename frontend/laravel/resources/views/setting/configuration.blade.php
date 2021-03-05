<div class="row">
    <div class="col-md-12 pall-40 pt-20">
        {{ Form::model($envSettting, ['route'=>'envSetting','method' => 'POST','data-toggle' => 'validator', 'enctype'=> 'multipart/form-data','id' => 'configuration']) }}
        {{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
        {{ Form::hidden('type','configuration') }}
        <div class="row">
            @foreach($envSettting as $key => $value)
                <?php
                    $name = str_replace('APP_','',$key);
                ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="{{ $key }}">{{ $name }}</label>
                        @if($name == 'DEBUG')
                            <div class="mt-1">
                                <label class="switch">
                                    {{ Form::checkbox('notification_status['.$key.']', true, null, []) }}
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        @else
                            {{ Form::text($key, str_replace('_',' ',$value), ['class'=>"form-control" , 'required']) }}
                        @endif
                    </div>
                </div>
            @endForeach
        </div>
        {{ Form::submit('Save Changes', ['class'=>"btn btn-md btn-primary float-md-right"]) }}
        {{ Form::close() }}
    </div>
</div>