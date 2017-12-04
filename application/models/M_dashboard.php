<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_netral(){
    $this->db->where('tone_berita','0');
    return $this->db->get('isi_berita');
  }

  function get_positif(){

  }

  function get_negatif(){
    $this->db->where('tone_berita','0');
    return $this->db->get('isi_berita');
  }

}
