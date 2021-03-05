<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function find($id)
    {
        return $this->db->get_where("service", array("id" => $id, "deleted_at" => null))->row(0);
    }

  
    public function all()
    {
        return $this->db->get_where("service", array("deleted_at" => NULL))->result();
    }

    function get_sub_category($category_id){
        return $this->db->get_where('service', array('category_id' => $category_id));
    }

    public function add($data)
    {
        return $this->db->insert('service', $data);
    }


    public function edit($data)
    {
        return $this->db->update('service', $data, array('id' => $data['id']));
    }

    
    public function delete_item($id)
    {
        return $this->db->delete('service', array('id' => $id));
    }


}
