<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProjectTaskController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
		$this->load->helper('form');
		$this->load->model('ProjectTask');

	}

	function index()
	{
		
	}
	public function store(){
		$data = $this->input->post();
		$insert = $this->ProjectTask->add($data);
		echo json_encode(array("status" => TRUE,'data'=>$data));
	}

	function update(){
		$data = $this->input->post();
		$data =	$this->ProjectTask->getdata($data)->row();
		echo json_encode(array("status" => TRUE,'data'=>$data));
		redirect(base_url('index.php/project-list'));

	}
	function deletetask($id){
        $item = $this->ProjectTask->delete_item($id);
        redirect(base_url('index.php/project-list'));
	}

	function updateSequence(){
		$data=$this->input->post();
		$data['boardtask'] = $this->ProjectTask->updateSequence($data);
		echo json_encode(array("status" => TRUE));			
        return response()->json([ 'status' => true , 'event' => 'callback' , 'message' => trans('messages.update_form',['form' => trans('messages.appointment')]) ]);
	}
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */