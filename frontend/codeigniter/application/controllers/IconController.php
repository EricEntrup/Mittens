<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class IconController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='icons/dropiocons';
		$this->load->view('index',$data);
	}
	function fontAwesome()
	{
		$data['page_name'] ='icons/font-awesome';
		$this->load->view('index',$data);
	}
	function lineAwesome()
	{
		$data['page_name'] ='icons/line-awesome';
		$this->load->view('index',$data);
	}
	function remixion()
	{
		$data['page_name'] ='icons/remixion';
		$this->load->view('index',$data);
	}
	function unicons()
	{
		$data['page_name'] ='icons/unicons';
		$this->load->view('index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */