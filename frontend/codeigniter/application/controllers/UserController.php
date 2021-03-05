<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public $ci;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->library('session');
		$this->load->helper('form');
		$this->load->model("Users");
		$this->load->model('MessageModel');
		$this->ci =& get_instance();
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['users'] =$this->Users->usertype();
			$data['page_name']  = "users/user";
			$data['user_detail'] = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
			$data['assets'] = 'datatable';
			$this->load->view('index', $data);
		}
	}
	function add_user(){
		$this->load->model('Role');
		$data['roles']=$this->Role->all();
		$data['user_detail'] = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$data['page_name']  = "users/create";
		$this->load->view('index', $data);
    }
    
    function save_user(){
		$data = $this->input->post();
		$password =$this->input->post('password');
		$config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

        } else {
			$data = array('image_metadata' => $this->upload->data());

		}
        $hasher = new PasswordHash(
            $this->ci->config->item('phpass_hash_strength', 'tank_auth'),
            $this->ci->config->item('phpass_hash_portable', 'tank_auth'));
        $data['password'] = $hasher->HashPassword($password);
        if(isset($data) && !empty($data)){
            $this->Users->create_user($data);
		}
		
		$this->MessageModel->set_messagge('Success','User added successfully','success');
		redirect(base_url('index.php/user-list'));
    }
	function delete($id){
        $item = $this->Users->delete_user($id);
        $this->MessageModel->set_messagge('Success','Deleted successfully','success');
        redirect(base_url('index.php/user-list'));
      }
	  function edit($id){
		$data['userdata']=$this->db->get_where('users',array('id'=>$id))->row();
		$data['page_name']="users/edit";
        $data['id'] = $id;
        $this->load->view('index', $data);
	  }
	  function update(){
		
		$data = array(
			'id' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'contact_number' => $this->input->post('contact_number'),
			'user_type' => $this->input->post('user_type'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
		);
		
		$result = $this->users->edit($data);
		
        $this->MessageModel->set_messagge('Success','Updated successfully','success');
        redirect(base_url('index.php/user-list'));
	  }
    

	
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */