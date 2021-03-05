@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                            <h4 class="card-title">{{ isset($pageTitle) ? $pageTitle : trans('messages.form') }}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="form-group text-center">
                                <div class="add-img-user profile-img-edit">
                                    <img class="profile-pic img-fluid wh-150p user_image_preview" src="{{ getSingleMedia($userdata,'profile_image',null) }}" alt="profile-pic">
                                    
                                    <!-- <div class="p-image">
                                    <h5 class="upload-button">file upload</h5>
                                        <a href="javascript:void();" class="upload-button btn iq-bg-primary">File Upload</a>
                                        <input class="file-upload" type="file" accept="image/*"> 
                                    </div>-->
                                </div>
                                <!-- <div class="img-extension mt-3">
                                    <div class="d-inline-block align-items-center">
                                        <span>Only</span>
                                    <a href="javascript:void();">.jpg</a>
                                    <a href="javascript:void();">.png</a>
                                    <a href="javascript:void();">.jpeg</a>
                                    <span>allowed</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{ trans('messages.user_information') }}</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('users.index') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>{{ trans('messages.back') }}</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="new-user-info">
                                {{ Form::model($userdata,['method' => 'POST','route'=>'users.store', 'data-toggle'=>"validator" ,'id'=>'user', 'enctype' => 'multipart/form-data'] ) }}
                                {{ Form::hidden('id') }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::text('name',old('name'),['placeholder' => trans('messages.name'),'class' =>'form-control','required']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {{ Form::label('email',trans('messages.email').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::email('email',old('email'), ['placeholder' => trans('messages.email'),'class' =>'form-control','required']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('contact_number',trans('messages.contact_number'),['class'=>'form-control-label']) }}
                                        {{ Form::text('contact_number',old('contact_number'),['placeholder' => trans('messages.contact_number'),'pattern'=>"[0-9]{6,12}",'class' =>'form-control']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('role',trans('messages.role').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                        {{ Form::select('user_type',$roles,old('user_type'),[ 'id' => 'role' ,'class' =>'form-control select2js','required']) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="d-block">{{ trans('messages.gender') }}</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="gender" class="custom-control-input" value="male" {{ (isset($userdata->gender) && $userdata->gender == 'male')  ? 'checked' :     '' }} >
                                            <label class="custom-control-label" for="male"> {{ trans('messages.male') }} </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input" value="female" {{ (isset($userdata->gender) && $userdata->gender == 'female')  ? 'checked' :     '' }}>
                                            <label class="custom-control-label" for="female"> {{ trans('messages.female') }} </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{ Form::label('profile_image',trans('messages.choose_profile_image'),['class'=>'form-control-label'] ) }}
                                        <div class="custom-file col-md-12">
                                            {{ Form::file('profile_image', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"profile_image" , 'lang'=>"en" , 'accept'=>"image/*"]) }}
                                            <label class="custom-file-label" id="imagelabel" for="profile_image">{{ $userdata->profile_image ?? trans('messages.profile_image') }}</label>
                                            {{Form::label(trans('messages.choose_profile_image'),isset($userdata->profile_image)?$userdata->profile_image:'',['id'=>'imagelabel','class'=>'custom-file-label']) }}
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group col-md-6">
                                        {{ Form::label('address',trans('messages.address'),['class'=>'form-control-label'],false) }}
                                        {{ Form::textarea('address',old('address'),['placeholder' => trans('messages.address'), 'id' => 'address' ,'class' =>'form-control' ,'rows' => 2]) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>
                                @if (!isset($userdata->id) || $userdata->id == null)
                                    <hr>
                                    <h5 class="mb-3">Security</h5>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {{ Form::label('password',trans('messages.password').' <span class="text-danger">*</span>',['class' => 'form-control-label'] , false) }}
                                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('messages.password'), 'required']) }}
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('password_confirmation',trans('messages.confirm_password').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                            {{ Form::password('password_confirmation', [
                                                'class' => 'form-control',
                                                'id' => 'password_confirmation',
                                                'placeholder' => trans('messages.confirm_password'),
                                                'required',
                                                'data-match' => '#password',
                                                'data-match-error' => trans('messages.password_does_not_match')
                                            ]) }}
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                    </div>
                                @endif
                                
                                {{ Form::submit( trans('messages.save'), ['class'=>'btn btn-md btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body_bottom')
<script>
(function($) {
	"use strict";
	$(document).ready(function (){
		 
        $(document).on('change','#profile_image',function(){
			readURL(this);
		})
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				var res=isImage(input.files[0].name);

				if(res==false){
					var msg='Image should be png/PNG, jpg/JPG & jpeg/JPG.';
					Snackbar.show({text: msg ,pos: 'bottom-right',backgroundColor:'#d32f2f',actionTextColor:'#fff'});
					return false;
				}

				reader.onload = function(e) {
				$('.user_image_preview').attr('src', e.target.result);
					$("#imagelabel").text((input.files[0].name));
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		function getExtension(filename) {
			var parts = filename.split('.');
			return parts[parts.length - 1];
		}

		function isImage(filename) {
			var ext = getExtension(filename);
			switch (ext.toLowerCase()) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'gif':
				return true;
			}
			return false;
		}
	})
})(jQuery);
</script>
@endsection