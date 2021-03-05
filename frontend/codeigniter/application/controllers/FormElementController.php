<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class FormElementController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='form-elements/form-layout';
		$this->load->view('index',$data);
	}
	function formValidation()
	{
		$data['page_name'] ='form-elements/form-validation';
		$this->load->view('index',$data);
	}function formSwitch()
	{
		$data['page_name'] ='form-elements/form-switch';
		$this->load->view('index',$data);
	}function formCheckbox()
	{
		$data['page_name'] ='form-elements/form-checkbox';
		$this->load->view('index',$data);
	}function formLayout()
	{
		$data['page_name'] ='form-elements/form-radio';
		$this->load->view('index',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */