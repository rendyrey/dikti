<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_netral(){
    $this->db->where('Field', $Value);
  }

  function get_positif(){

  }

  function get_negatif(){

  }

}
