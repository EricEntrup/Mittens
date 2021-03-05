<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MessageModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function set_messagge($title,$msg,$type){
        $d['title']    =  $title;
        $d['msg']     =  $msg;
        $d['type']   =  $type;
        $this->session->set_flashdata('item',$d);
    }

}
