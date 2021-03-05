<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->library('tank_auth');
        $this->load->helper(array('url','html','form'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('Category');
        $this->load->model('MessageModel');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "categories/category";
            $data['pageTitle'] =" Category List";
            $data['all_category'] =$this->Category->all();
            $data['assets'] = 'datatable';
			$this->load->view('index', $data);
		}
    }
    public function create($id=-1)
    {
       
        if($id == '-1'){
            $data['pageTitle'] = "Add Category";
        }else{
            $data['categorydata']=$this->db->get_where('category',array('id'=>$id))->row();
            $data['pageTitle'] = "Edit Categoery";
        }
        $data['page_name']="categories/create";
        $data['id'] = $id;
        $this->load->view('index', $data);
    }

    function store(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run() === FALSE){

            redirect(base_url('index.php/category-add'));
        }
        else{
            $data = $this->input->post();
            $data['status'] = '1';
            $result = $this->Category->add($data);
            $this->MessageModel->set_messagge('Success','Added Sucessfully','success');
            redirect(base_url('index.php/category-list'));
        }
    }

    function update(){
        $data = $this->input->post();
        $result = $this->Category->edit($data);
        $this->MessageModel->set_messagge('Success','Updated successfully','success');
        redirect(base_url('index.php/category-list'));
    }

    function updateStatus($status,$id){
        $data = $this->input->post();
		$categoery = $this->Category->find($data['id']);
		$status_update = array('status' => $data['status']);    
        $this->db->where('id', $data['id']);
        $data=$this->MessageModel->set_messagge('Success','Updated successfully','success');
        $this->db->update('category', $status_update); 
        json_encode(array("status" => TRUE,'message'=>"Updated successsuly"));
    }
    function deleteCategory($id){
        $item = $this->Category->delete_item($id);
        $this->MessageModel->set_messagge('Success','Deleted successfully','success');
        redirect(base_url('index.php/category-list'));
      }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */