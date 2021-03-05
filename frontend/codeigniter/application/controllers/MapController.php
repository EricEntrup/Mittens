<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class MapController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='maps/google';
		$this->load->view('index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */