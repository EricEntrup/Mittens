<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
       
        
	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "dashboard/dashboard-1";
			$this->load->view('index', $data);
		}
	}
	function dashboardTwo()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "dashboard/dashboard-2";
			$this->load->view('index', $data);
		}
    }
    
 
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
