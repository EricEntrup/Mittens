<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function find($id)
    {
        return $this->db->get_where("category", array("id" => $id, "deleted_at" => null))->row(0);
    }

  
    public function all()
    {
        return $this->db->get_where("category", array("deleted_at" => NULL))->result();
    }


    public function add($data)
    {
        return $this->db->insert('category', $data);
    }


    public function edit($data)
    {
        return $this->db->update('category', $data, array('id' => $data['id']));
    }

    
    public function delete_item($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('category');
    }

  

}
