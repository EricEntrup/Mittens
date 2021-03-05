<?php $this->load->view('partials/_body_style'); ?>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => 'admin@admin.com',
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=>"form-control mb-0"
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class'=>'form-control mb-0',
	'value'=>'12345678'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'class'=>"custom-control-input"
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
					<h1 class="mb-0">Sign in</h1>
					<p>Enter your email address and password to access admin panel.</p>
					<?php echo form_open($this->uri->uri_string(),['class' => 'mt-4']); ?>
						<div class="form-group">
							<?php echo form_label('Email address', $login['id']); ?>
							<?php echo form_input($login); ?>
							<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
						</div>
						<div class="form-group">
							<?php echo form_label('Password', $password['id']); ?>
							<a href="<?php echo base_url('index.php/auth/forgot_password/')?>" class="float-right">Forgot password?</a>
							<?php echo form_password($password); ?>
							<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
						</div>

						
								<div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
									<?php echo form_submit('submit', 'Sign in',['class'=>'btn btn-primary float-right']); ?>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="<?php echo base_url("index.php/auth/register/")?>">Sign up</a></span>
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
