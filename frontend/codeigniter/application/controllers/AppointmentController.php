<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AppointmentController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Appointment');
        $this->load->model('MessageModel');
        
	}

    //Appoiment List
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
            $data['page_name']  = "appointments/appointment";
            $data['pageTitle'] ="Appointment List";
            $data['list'] = $this->Appointment->all();
            $data['assets'] = 'fullcalendar';
			$this->load->view('index', $data);
		}
    }
    
    //Create Appoiment
    public function create($id=-1)
    {
        $this->load->model('Category');
        $this->load->model('Users');
        $data['category'] = $this->Category->all();
        $data['users'] = $this->Users->all();

        if($id == '-1'){
            $data['pageTitle'] = "Add Appointment";
            $data['page_name']="appointments/create";
            $this->load->view('index', $data);
        }else{
            $data['appdata']=$this->Appointment->getData($id);
            $data['pageTitle'] = "Edit Appointment";
            $data['page_name']="appointments/update";
            $this->load->view('index', $data);
        }
        
        
    }
    public function edit(){
        
    }
    //Save Appoiment
    public function store(){
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('service_id', 'Service', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run() === FALSE){

            redirect(base_url('index.php/service-add'));
        }
        else{
            $data = $this->input->post();
            $data['date'] = ($this->input->post('date')) ? date('Y-m-d',strtotime($this->input->post('date'))) : date('Y-m-d');
            $result = $this->Appointment->add($data);
        }
        redirect( base_url('index.php/appointment-list')); 
        
    }


    //Update on drop event
    public function update(){
        $data = $this->input->post();
        $data['date'] = date('Y-m-d',strtotime($data['date']));
        $appointment = $this->Appointment->edit($data);
        return response()->json([ 'status' => true , 'message' =>"Updated Sucessfully" ]);
    }


    //Update data
    public function updateData(){
        $data = $this->input->post();
        $data['date'] = date('Y-m-d',strtotime($data['date']));
        $result = $this->Appointment->edit($data);
        $this->MessageModel->set_messagge('Success','Updated successfully','success');
        redirect(base_url('index.php/appointment-list'));
    }

    //delete appoiment
    function deleteAppoimtment($id){
        $id = $this->uri->segment(3);
        if($this->Appointment->delete($id)){
			$this->session->set_flashdata('message', 'Deleted Sucessfully');
            redirect( base_url('index.php/appointment-list')); 
		}		
      }


      //view
      function view($id){
        $data['pageTitle'] = "View Appoiment";
        header( "Content-Type: application/json" );
        $data['appointmentdata'] = $this->Appointment->getData($id);
        $output = $this->load->view("appointments/show-view",$data, true);
        echo json_encode(['status' => true,'html' => $output,'data' => $data]);
      }

      //Get Categoey for appoiment
      function get_sub_category(){
        $this->load->model('Service');
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Service->get_sub_category($category_id)->result();
        echo json_encode($data);
    }

   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
