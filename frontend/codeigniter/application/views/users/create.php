        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                            <h4 class="card-title">Add New User</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="form-group">
                                <div class="add-img-user profile-img-edit">
                                    <img class="profile-pic img-fluid wh-150p user_image_preview" alt="profile-pic">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">New User Information</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="new-user-info">
                            <?php echo form_open(base_url('index.php/user-save')); ?>
                                 <input type="hidden" name="id">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label name="name" class="form-control-label">Name</label>
                                        <input type ="text" name="username" class="form-control" placeholder="Enter Name" required />
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                         <label name="email" class="form-control-label">Email</label>
                                        <input type ="email" name="email" class="form-control" placeholder="Enter email" required/>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="email" class="form-control-label">Contact Number</label>
                                        <input type ="text" name="contact_number" class="form-control" placeholder="Enter contact no" required/>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="role" class="form-control-label">Role</label>
                                        <select name="user_type" id="user_type" class="select2js form-control">
                                            <option value="NULL">select Role</option>
                                            <?php foreach($roles as $data){ ?>
                                                    <option value="<?php echo $data->name ?>"><?php echo $data->name ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block">Gender</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="gender" class="custom-control-input" value="male" <?php echo (isset($data->gender) && $data->gender == 'male')  ? 'checked' :     '' ?> >
                                            <label class="custom-control-label" for="male"> male </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input" value="female" <?php echo (isset($data->gender) && $data->gender == 'female')  ? 'checked' :     '' ?>>
                                            <label class="custom-control-label" for="female">female </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="name" class="form-control-label" id="imagelabel">Upload Profile</label>
                                        <input type ="file" name="profile_image" id="profile_image" class="form-control" placeholder="Enter Name" required />
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label name="address" class="form-control-label">Address</label>
                                        <textarea name="address" class ='form-control' rows = 2></textarea>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    
                                </div>
                                    <hr>
                                    <h5 class="mb-3">Security</h5>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label name="password" class="form-control-label">Password</label>
                                            <input type ="password" name="password" class="form-control"placeholder="Enter password" required/>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label name="password_confirmation" class="form-control-label">Confirm Password</label>
                                            <input type ="password" name="password" class="form-control" placeholder="Enter confirm password" data-match = '#password', data-match-error ="password does not match" required/>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
$(document).ready(function (){
         $(document).on('change','#profile_image',function(){
             readURL(this);
         })
         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 var res=isImage(input.files[0].name);
                 console.log(res);
 
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
        });
</script>