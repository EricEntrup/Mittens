<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class TableController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='tables/simple-table';
		$this->load->view('index',$data);
	}
	function dataTable()
	{
		$data['page_name'] ='tables/datatble';
		$this->load->view('index',$data);
	}
	function editTable()
	{
		$data['page_name'] ='tables/edit-table';
		$this->load->view('index',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */