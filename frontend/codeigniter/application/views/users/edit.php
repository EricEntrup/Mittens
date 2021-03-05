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
                                        <?php $user = base_url('assets/images/user/1.jpg');
                                            if(isset($userdata->profile_image)){
                                        ?>
                                        <img class="profile-pic img-fluid wh-150p" src="<?php echo base_url('assets/images/'.$userdata->profile_image) ?>" alt="profile-pic">
                                        <?php } else{ ?>
                                            <img class="profile-pic img-fluid wh-150p" src="<?php echo $user; ?>" alt="profile-pic">
                                        <?php } ?>
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
                            <?php echo form_open(base_url('index.php/user-update')); ?>
                            <input type="hidden" name="id" value=<?php echo isset($userdata->id) ? $userdata->id :'';?> />
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label name="name" class="form-control-label">Name</label>
                                        <input type ="text" name="username" class="form-control" placeholder="Enter Name" value="<?php echo isset($userdata->username) ? $userdata->username : '' ?>" required />
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                         <label name="email" class="form-control-label">Email</label>
                                        <input type ="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo isset($userdata->email) ? $userdata->email : '' ?>" required/>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="email" class="form-control-label">Contact Number</label>
                                        <input type ="text" name="contact_number" class="form-control" placeholder="Enter contact no" value="<?php echo isset($userdata->contact_number) ? $userdata->contact_number : '' ?>" required/>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="role" class="form-control-label">Role</label>
                                        <select name="user_type" id="user_type" class="select2js form-control">
                                            <option value="NULL">select Role</option>
                                            <?php if(isset($userdata->user_type)){ ?>
                                                    <option value="<?php echo $userdata->user_type ?>" selected > <?php echo isset($userdata->user_type) ? $userdata->user_type : "" ?></option>
                                            <?php }?>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block">Gender</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="gender" class="custom-control-input" value="male" <?php echo isset($userdata->gender)  ? 'checked' :     '' ?> >
                                            <label class="custom-control-label" for="male"> male </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input" value="female" <?php echo isset($userdata->gender)  ? 'checked' :     '' ?>>
                                            <label class="custom-control-label" for="female">female </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label name="name" class="form-control-label">Upload Profile</label>
                                        <input type ="file" name="profile_image" class="form-control" placeholder="Enter Name" />
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label name="address" class="form-control-label">Address</label>
                                        <textarea name="address" class ='form-control' rows = 2 value=""><?php echo isset($userdata->address) ? $userdata->address : '' ?></textarea>
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
