<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class FormWizardController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='form-wizard/simple-wizrd';
		$this->load->view('index',$data);
	}
	function validateWizard()
	{
		$data['page_name'] ='form-wizard/validate-wizard';
		$this->load->view('index',$data);
	}
	function verticalWizard()
	{
		$data['page_name'] ='form-wizard/vertical-wizard';
		$this->load->view('index',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */