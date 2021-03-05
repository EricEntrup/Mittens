<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="iq-card">
				<div class="iq-card-header d-flex justify-content-between">
					<div class="iq-header-title">
						<h4 class="card-title">settings</h4>
					</div>
				</div>
				<div class="iq-card-body">
					<div class="row">
						<div class="col-sm-3">
							<ul class="nav flex-column nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
								</li>
								
							</ul>
						</div>
						<div class="col-sm-9">
							<div class="tab-content" id="pills-tabContent-2">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="col-md-12">
										<div class="row ">
											<div class="col-md-4">
												<div class="user-sidebar">
													<div class="user-body user-profile text-center">
														<div class="user-img">
															<?php if(isset($user_detail->profile_image)){ ?>
																<img class="rounded-circle  wh-150p  image-fluid profile_image_preview" src="<?php echo $user_detail->profile_image; ?>" alt="profile-pic">
															<?php }else{ ?>
																<img class="rounded-circle  wh-150p  image-fluid profile_image_preview" src="<?php echo base_url('assets/images/user/1.jpg') ?>" alt="profile-pic">
															<?php  } ?>
														</div>
													</div>
													
												</div>
											</div>
											<div class="col-md-8">
												<div class="user-content">
													<form action="<?php echo base_url('index.php/profile_update');?>" method="POST">
														<input type="hidden" name="profile_image" value="profile_image">
														<div class="row ">
																		
															<div class="col-md-6">
																<div class="form-group  has-feedback">    
																	<label class="form-control-label col-md-12">Name <span class="text-danger">*</span></label>                                    
																	<div class="col-md-12">
																		<input type="text" name="username" value="<?php echo isset($user_detail->username) ? $user_detail->username:'';?>" class="form-control" />
																		<small class="help-block with-errors text-danger"></small>
																	</div> 
																</div> 
															</div>

															<div class="col-md-6">
																<div class="form-group  has-feedback">
																	<label class="form-control-label col-md-12">Contact No <span class="text-danger">*</span></label>
																	<div class="col-md-12">  
																		<input type="text" name="contact_number" value="<?php echo isset($user_detail->contact_number) ? $user_detail->contact_number :'';?>" class="form-control" />
																		<small class="help-block with-errors text-danger"></small>
																	</div>
																</div> 
															</div>
																
															<div class="col-md-6">
																<div class="form-group">
																	<label class="form-control-label col-md-12">Profile Image <span class="text-danger">*</span></label>
																	<div class="col-md-12">
																		<div class="custom-file col-md-12">
																			<input type="file" name="profile_image" id="profile_image" class="custom-file-input custom-file-input-sm detail" />
																			<label class="custom-file-label" id="imagelabel" for="profile_image">Profile Image</label>
																		</div>
																	</div> 
																</div> 
															</div>

															<div class="col-md-12">
																<button type="submit" class="btn btn-md btn-primary float-md-right" >Update</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<form action="<?php echo base_url('index.php/change-password');?>" method="POST">
											<div class="row">
												<div class="col-md-6 offset-md-3">
													<input type="hidden" name="email" class="form-control" />
														<div class="form-group has-feedback">
															<label name="old" class="form-control-label col-md-12">Old Password <span class="text-danger">*</span></label>
															<div class="col-md-12">
																<input type="password" name="old" class="form-control" />
															</div>
														</div>
														<div class="form-group has-feedback">
															<label name="old" class="form-control-label col-md-12">Old Password <span class="text-danger">*</span></label>
															<div class="col-md-12">
																<input type="password" name="password" class="form-control" />
															</div>
														</div>
														<div class="form-group has-feedback">
															<label name="old" class="form-control-label col-md-12">Old Password <span class="text-danger">*</span></label>
															<div class="col-md-12">
																<input type="password" name="confirm_password" class="form-control" />
															</div>
														</div>
														<div class="form-group ">
															<div class="col-md-12">
																<button type="submit" class="btn btn-md btn-primary float-md-right mt-15" >Save</button>
															</div>
														</div>
												</div>
											</div>
										</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>