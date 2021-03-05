<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class PermissionController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->helper('form');
        $this->load->model('Role');
		$this->load->model('Permission');
		$this->load->model('MessageModel');
		$this->load->library('user_agent');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data =$this->input->post();
			$data['page_name']  = "permissions/permission";
			$data['roles']=$this->Role->all_permission ();
			$data['permission']=$this->Permission->all();
			$data['parent_permission'] =$this->Permission->getdata();
			$data['sub_permission'] =$this->Permission->getSubPermission();
			$data['permission_role'] =$this->Role->roleWisePermissionDetails(9);
			$this->load->view('index', $data);
		}
	}
	function permission_add(){
			$data = array(
				'name' => $this->input->post('name'),
				'parent_id'=>$this->input->post('parent_id')
			);
			$insert = $this->Permission->add($data);
			echo json_encode(array("status" => TRUE,'data'=>$data));
	}

	
    function role(){
        if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "roles/role";
			$data['roles']=$this->Role->all();
			$data['assets'] = 'datatable';
			$this->load->view('index', $data);
		}
    }
    function add_role(){
		$data = array(
		'name' => $this->input->post('name'),
		);
		$insert = $this->Role->add($data);
		echo json_encode(array("status" => TRUE));
	}	

	public function changeRolestatus($status,$id)
    {
		$data = $this->input->post();
		$role = $this->Role->find($data['id']);
		$status_update = array('status' => $data['status']);    
		$this->db->where('id', $data['id']);
		$this->db->update('roles', $status_update); 
	
	}
	public function permissionRole(){
		$data = array(
			'role_id' => $this->input->post('role_id'),
			'permission_id'=> $this->input->post('permission_id')
			);
		$permision_role = $this->Role->addPermissions($data['role_id'],$data['permission_id']);
		$data['page_name']  = "permissions/permission";
		$this->load->view('index', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */