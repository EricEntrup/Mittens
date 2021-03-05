<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function find($id)
    {
        return $this->db->get_where("appointment", array("id" => $id, "deleted_at" => null))->row(0);
    }

  
    public function all()
    {
        return $this->db->get_where("appointment")->result();
    }


    public function add($data)
    {
        return $this->db->insert('appointment', $data);
    }


    public function edit($data)
    {
        return $this->db->update('appointment', $data, array('id' => $data['id']));
    }

    
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('appointment');
    }
    public function getData($id){
        $this->db->select('c.id,c.name as catname,s.id,s.name as sname,a.*');
        $this->db->from('appointment as a');
        $this->db->join('category as c','a.category_id=c.id','left');
        $this->db->join('service as s','a.service_id=s.id','left');
        $this->db->join('users as u','a.user_id=u.id','left');
        $this->db->where('a.id',$id);
        $query=$this->db->get();
        return $query->result();
    }
}
