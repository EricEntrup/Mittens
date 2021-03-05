<?php $this->load->view('partials/_body_style'); ?>
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class'=>"form-control mb-0"
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=>"form-control mb-0"
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'=>"form-control mb-0"
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'=>"form-control mb-0"
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

		<section class="sign-in-page">
			<div class="container p-0">
				<div class="row no-gutters">
					<div class="col-sm-12 align-self-center">
                        <div class="sign-in-from bg-white">
                            <h1 class="mb-0">Sign Up</h1>
                            <p>Enter your email address and password to access admin panel.</p>
							<?php echo form_open($this->uri->uri_string(),['class' => 'mt-4']); ?>
							
								<?php if ($use_username) { ?>



								 <div class="form-group">
									<td><?php echo form_label('Username', $username['id']); ?></td>
									<td><?php echo form_input($username); ?></td>
									<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
								</div>
								<?php } ?>
								 <div class="form-group">
									<td><?php echo form_label('Email Address', $email['id']); ?></td>
									<td><?php echo form_input($email); ?></td>
									<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
								</div>
								 <div class="form-group">
									<td><?php echo form_label('Password', $password['id']); ?></td>
									<td><?php echo form_password($password); ?></td>
									<td style="color: red;"><?php echo form_error($password['name']); ?></td>
								</div>
								 <div class="form-group">
									<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
									<td><?php echo form_password($confirm_password); ?></td>
									<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
								</div>
								<div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
									<?php echo form_submit('register', 'Sign in',['class'=>'btn btn-primary float-right']); ?>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="<?php echo base_url("index.php/auth/login/")?>" >Log In</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
							<?php echo form_close(); ?>
							</div>
					</div>
                </div>
            </div>
        </section>


<?php $this->load->view('partials/_body_scripts');?>
