<div class="col-md-12">
    <div class="row ">
		<div class="col-md-4">
			<div class="user-sidebar">
				<div class="user-body user-profile text-center">
					<div class="user-img">
						<img class="rounded-circle  wh-150p  image-fluid profile_image_preview" src="{{ getSingleMedia($user_data,'profile_image', null) }}" alt="profile-pic">
					</div>
					<div class="sideuser-info">
						<span class="mb-2">{{ $user_data->username }}</span>
						<a>{{ $user_data->email }}</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="user-content">
				{{ Form::model($user_data, ['route'=>'user.update','method' => 'POST','data-toggle'=>"validator" , 'enctype'=> 'multipart/form-data','id' => 'user-form']) }}
					<input type="hidden" name="profile" value="profile">
					{{ Form::hidden('username') }}
					{{ Form::hidden('email') }}
				    {{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
				    <div class="row ">
				        
				        <div class="col-md-6">
				            <div class="form-group  has-feedback">                                        
								{{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>',['class'=>'form-control-label col-md-12'], false ) }}
				                <div class="col-md-12">
									{{ Form::text('name',old('name'),['placeholder' => trans('messages.name'),'class' =>'form-control','required']) }}
									<small class="help-block with-errors text-danger"></small>
				                </div> 
				            </div> 
				        </div>

				        <div class="col-md-6">
				            <div class="form-group  has-feedback">
								{{ Form::label('contact_number',trans('messages.contact_number').' <span class="text-danger">*</span>',['class'=>'form-control-label col-md-12'], false ) }}
				                <div class="col-md-12">  
				                    {{ Form::text('contact_number', old('contact_number'), array('placeholder' => trans('messages.contact_number'),'class' => 'form-control', 'pattern'=>"[0-9]{6,12}", 'data-minlength'=>'10','maxlength'=>13,'required')) }}
									<small class="help-block with-errors text-danger"></small>
								</div>
				            </div> 
				        </div>
				   
				        <div class="col-md-6">
				            <div class="form-group">
								{{ Form::label('profile_image',trans('messages.choose_profile_image'),['class'=>'form-control-label col-md-12'] ) }}
								<div class="col-md-12">
									<div class="custom-file col-md-12">
										{{ Form::file('profile_image', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"profile_image" , 'lang'=>"en" , 'accept'=>"image/*"]) }}
										<label class="custom-file-label" id="imagelabel" for="profile_image">Profile Image</label>
									</div>
								</div> 
				            </div> 
				        </div>

				        <div class="col-md-12">
							{{ Form::submit(trans('messages.update'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
				        </div>
				    </div>
			</div>
		</div>
    </div>
</div>

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
				$('.profile_image_preview').attr('src', e.target.result);
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