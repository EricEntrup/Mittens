<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class ChartController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
	
		$data['page_name'] ='charts/morries';
		$this->load->view('index',$data);
	
	}
	
	function highChart()
	{
	
		$data['page_name'] ='charts/high';
		$this->load->view('index',$data);
	
	}
	function amChart()
	{
	
		$data['page_name'] ='charts/am';
		$this->load->view('index',$data);
	
	}
	function apexChart()
	{
	
		$data['page_name'] ='charts/apex';
		$this->load->view('index',$data);
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */