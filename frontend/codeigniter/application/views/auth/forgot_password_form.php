<?php $this->load->view('partials/_body_style'); ?>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>

<section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-sm-12 align-self-center">
                        <div class="sign-in-from bg-white">
                            <h1 class="mb-0">Reset Password</h1>
                            <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>
							<?php echo form_open($this->uri->uri_string()); ?>
                                
                                <div class="form-group">
									<?php echo form_label($login_label, $login['id'],['class'=>'form-control-label mb-0']); ?>
									<?php echo form_input($login,'',['class'=>'form-control']); ?>
									<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>

                                </div>
                                
                                <div class="d-inline-block w-100">
                               		 <?php echo form_submit('reset', 'Reset Password',['class'=>'btn btn-primary float-right']); ?>
                                </div>
							<?php echo form_close(); ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $this->load->view('partials/_body_scripts');?>