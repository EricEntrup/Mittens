<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class ExtraPagesController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$data['page_name'] ='extra-pages/timeline';
		$this->load->view('index',$data);
	}
	function invoice()
	{
		$data['page_name'] ='extra-pages/invoice';
		$this->load->view('index',$data);
	}
	function blankPage()
	{
		$data['page_name'] ='extra-pages/blank-page';
		$this->load->view('index',$data);
	}
	function error400()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('extra-pages/error404');
	}
	function error500()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('extra-pages/error500');
	}
	function pricing()
	{
		$data['page_name'] ='extra-pages/pricing';
		$this->load->view('index',$data);
	}
	function pricingOne()
	{
		$data['page_name'] ='extra-pages/pricing-one';
		$this->load->view('index',$data);
	}
	function maintenance()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('extra-pages/maintenace');
	}
	function commingSoon()
	{
		$this->load->view('partials/_body_style.php'); 
		$this->load->view('partials/_body_scripts.php'); 
		$this->load->view('partials/_dynamic_script.php'); 
		$this->load->view('extra-pages/comming-soon');
	}
	function faq()
	{
		$data['page_name'] ='extra-pages/faq';
		$this->load->view('index',$data);
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */