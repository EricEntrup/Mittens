<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProjectController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
		$this->load->helper('form');
		$this->load->model('Projects');

	}

	public function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['page_name']  = "projects/board";
			$data['pageTitle'] ="Project Management List";
			$data['max'] = $this->Projects->rowCount();
			$data['max'] = $data['max'] + 1 ;
			$data['boarddata'] = $this->Projects->all();  
			$data['taskdata']=$this->Projects->getTask();
			$this->load->view('index', $data);
		}
	}

	public function store(){
		$data = $this->input->post();
		$insert = $this->Projects->add($data);
		echo json_encode(array("status" => TRUE,'data'=>$data));
	}


	function deleteboard($id){
		$this->load->model('ProjectTask');
		$task= $this->ProjectTask->findtask($id);
		if($task <= 0){
			$item = $this->Projects->delete_item($id);
		}
		else{
		}
        redirect(base_url('index.php/project-list'));
	}
	function update(){
		$data = $this->input->post();
		$data =	$this->Projects->getdata($data)->row();
		echo json_encode(array("status" => TRUE,'data'=>$data));

	}
	function updateData(){
		$data = $this->input->post();
		$update = $this->Projects->edit($data);
		echo json_encode(array("status" => TRUE ,'data'=>$data));
	}
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */