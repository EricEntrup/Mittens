{{ Form::model($user_data, ['route'=>'user.password.update','method' => 'POST','data-toggle' => 'validator', 'enctype'=> 'multipart/form-data','id' => 'user-password']) }}
    <div class="row">
        <div class="col-md-6 offset-md-3">
            {{csrf_field()}}
            {{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
            <div class="form-group has-feedback">
                {{ Form::label('old_password',trans('messages.old_password').' <span class="text-danger">*</span>',['class'=>'form-control-label col-md-12'], false ) }}
                <div class="col-md-12">
                    {{ Form::password('old', ['class'=>"form-control", "id" => 'old_password' , "placeholder" => trans('messages.old_password') ,'required']) }}
                </div>
            </div>
            <div class="form-group has-feedback">
                
                {{ Form::label('password',trans('messages.new_password').' <span class="text-danger">*</span>',['class'=>'form-control-label col-md-12'], false ) }}
                <div class="col-md-12">
                    {{ Form::password('password', ['class'=>"form-control" , 'id'=>"password", "placeholder" => trans('messages.new_password') ,'required']) }}
                </div>
            </div>
            <div class="form-group has-feedback">
                {{ Form::label('password-confirm',trans('messages.confirm_new_password').' <span class="text-danger">*</span>',['class'=>'form-control-label col-md-12'], false ) }}
                <div class="col-md-12">
                    {{ Form::password('password_confirmation', ['class'=>"form-control" , 'id'=>"password-confirm", "placeholder" => trans('messages.confirm_new_password') ,'required']) }}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-md-12">
                    {{ Form::submit(trans('messages.save'), ['id'=>"submit" ,'class'=>"btn btn-md btn-primary float-md-right mt-15"]) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}