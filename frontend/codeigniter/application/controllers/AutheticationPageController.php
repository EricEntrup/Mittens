<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class AutheticationPageController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		 $this->load->view('partials/_body_style.php'); 
		 $this->load->view('partials/_body_scripts.php'); 
		 $this->load->view('partials/_dynamic_script.php'); 
		 $this->load->view('authentication-page/login');
	}
	function registrtion()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('authentication-page/registration');
	}
	function recoverPassword()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('authentication-page/forget-pass');
	}
	function confirmMail()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('authentication-page/confim-mail');
	}
	function lockScreen()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('authentication-page/lock-screen');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */