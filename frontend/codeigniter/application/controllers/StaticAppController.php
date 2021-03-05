<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class StaticAppController extends CI_Controller
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
            $data['page_name']  = "static-app/mail";
			$this->load->view('index', $data);
		}
	}
	function composeEmail()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "static-app/compose-email";
			$this->load->view('index', $data);
		}
    }
    function todoList()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "static-app/todo-list";
			$this->load->view('index', $data);
		}
    }
    function chat()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "static-app/chat";
			$this->load->view('index', $data);
		}
    }
    
 
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
