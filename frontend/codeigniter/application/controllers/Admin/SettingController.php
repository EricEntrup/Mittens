<?php 
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class SettingController extends CI_Controller
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

			$data['user_detail'] = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
            $data['page_name']  = "settings/setting";
			$this->load->view('index', $data);
		}
	}																	
	
	function profile_update(){
		$data =$this->tank_auth->get_user_id();
		$data1=$this->input->post();
		$path = base_url('uploads/');
		$config['upload_path'] = $path;
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
		$this->Users->edit($data,$data1);
		$this->MessageModel->set_messagge('Success','Profile Update successfully','success');
		redirect(base_url('index.php/setting'));
		
	}

	function changePassword(){
		$data=array(
			'old' =>$this->input->post('old'),
			'password' =>$this->input->post('password'),
			'confirm_password' =>$this->input->post('confirm_password'),
		);
		if($data['password'] == $data['confirm_password']){
			$hasher = new PasswordHash(
				$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
				$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			$user_id =$this->tank_auth->get_user_id();
			$new_pass= $hasher->HashPassword($this->input->post('password'));
			$this->Users->change_password($user_id,$new_pass);
			$this->MessageModel->set_messagge('Success','Password Updated successfully','success');
			redirect(base_url('index.php/setting'));
		}
	}
}

