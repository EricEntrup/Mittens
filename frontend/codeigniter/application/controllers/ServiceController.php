<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ServiceController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Service');
        $this->load->model('MessageModel');
	}

    //Service Listing
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "services/service";
            $data['pageTitle'] ="Service List";
            $data['all_service'] =$this->Service->all();
            $data['assets'] = 'datatable';
			$this->load->view('index', $data);
		}
    }

    //Create service
    public function create($id=-1)
    {
        if($id == '-1'){
            $data['pageTitle'] = "Add Service";
        }else{
            $data['servicedata']=$this->db->get_where('service',array('id'=>$id))->row();
            $data['pageTitle'] = "Edit Service";
        }
        $this->load->model('Category');
        $data['category'] = $this->Category->all();
        $data['page_name']="services/create";
        $this->load->view('index', $data);
    }

    //Add service
    function store(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run() === FALSE){
            redirect(base_url('index.php/category-add'));
        }
        else{
            $data = $this->input->post();
            $data['status'] = '1';
            $result = $this->Service->add($data);
        }
        $this->MessageModel->set_messagge('Success','Service Added Sucessfully','success');
        redirect(base_url('index.php/service-list'));
    }

    function update(){
        $data = $this->input->post();
        $result = $this->Service->edit($data);
        $this->MessageModel->set_messagge('Success','Service Updated Sucessfully','success');
        redirect(base_url('index.php/service-list'));
    }

    function updateStatus($status,$id){
        $data = $this->input->post();
		$categoery = $this->Service->find($data['id']);
		$status_update = array('status' => $data['status']);    
		$this->db->where('id', $data['id']);
        $this->db->update('service', $status_update); 
        json_encode(array("status" => TRUE,'message'=>"Updated successsuly"));
    }
    function deleteService($id){
        $item = $this->Service->delete_item($id);
        $this->MessageModel->set_messagge('Success','Deleted successfully','success');
        redirect(base_url('index.php/service-list'));
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */