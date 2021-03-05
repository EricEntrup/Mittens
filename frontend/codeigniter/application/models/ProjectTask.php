<?php
/**
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>
 * Website: https://github.com/firoz-ahmad-likhon
 *
 * Copyright (c) 2018 Firoz Ahmad Likhon
 * Released under the MIT license
 *       ___            ___  ___    __    ___      ___  ___________  ___      ___
 *      /  /           /  / /  /  _/ /   /  /     /  / / _______  / /   \    /  /
 *     /  /           /  / /  /_ / /    /  /_____/  / / /      / / /     \  /  /
 *    /  /           /  / /   __|      /   _____   / / /      / / /  / \  \/  /
 *   /  /_ _ _ _ _  /  / /  /   \ \   /  /     /  / / /______/ / /  /   \    /
 *  /____________/ /__/ /__/     \_\ /__/     /__/ /__________/ /__/     /__/
 * Likhon the hackman, who claims himself as a hacker but really he isn't.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectTask extends CI_Model
{
  
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find data.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->get_where("board_task", array("id" => $id, "deleted_at" => null))->row(0);
    }

    
    /**
     * Read all data.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->db->get_where("board_task", array("deleted_at" => NULL))->result();
    }

    

    /**
     * Insert data.
     *
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        return $this->db->insert('board_task', $data);
    }

    /**
     * Edit data.
     *
     * @param $data
     * @return mixed
     */
    public function edit($data)
    {
        return $this->db->update('board_task', $data, array('id' => $data['id']));
    }

    /**
     * Delete data.
     *
     * @param $id
     * @return int
     */
    public function findtask($id){
        $query= $this->db->query('SELECT * FROM board_task where board_id =' . $id); 
        return $query->num_rows();
         
    }
    public function delete_item($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('board_task');
    }

    public function rowCount(){
        $query = $this->db->query('SELECT * FROM board_task');
        return $query->num_rows();
    }

    public function getdata($data){
        return $this->db->query('SELECT * FROM board_task WHERE id = '. $data['id']);
    }

    public function updateSequence($data){
        return $this->db->update('board_task', $data, array('id' => $data['boardtask_id']));

    }
    
  
}