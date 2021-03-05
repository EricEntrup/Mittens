<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EcommerceController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['page_name']  = "ecommerce/index";
		$data['pageTitle'] ="";
		$this->load->view('index', $data);
	}
	function productDetails()
	{
		$data['page_name']  = "ecommerce/product-detail";
		$data['pageTitle'] ="";
		$this->load->view('index', $data);
	}
	function checkout()
	{
		$data['page_name']  = "ecommerce/checkout";
		$data['pageTitle'] ="";
		$this->load->view('index', $data);
	}

}
