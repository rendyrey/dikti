<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramMedia extends CI_Controller {

  /**
  * Index Page for this controller.
  *
  * Maps to the following URL
  * 		http://example.com/index.php/welcome
  *	- or -
  * 		http://example.com/index.php/welcome/index
  *	- or -
  * Since this controller is set as the default controller in
  * config/routes.php, it's displayed at http://example.com/
  *
  * So any other public methods not prefixed with an underscore will
  * map to /index.php/welcome/<method_name>
  * @see https://codeigniter.com/user_guide/general/urls.html
  */

  public function __construct(){
    parent::__construct();
    $this->load->model('M_berita');
    $this->load->model('M_narasumber');

  }
  public function check_login(){
    if($this->session->userdata('login')!=TRUE && $this->session->userdata('user')!='administrator'){
      $data['message']=$this->session->flashdata('message');
      $data['action']='Login/process_login_admin';
      // $this->load->view('templates/script_header');
      // $this->load->view('index',$data);
      // exit;
      redirect('Login');
    }
  }

  public function wawancara(){
    $this->check_login();
    $query=$this->M_berita->get();
    $data['jml'] = $query->num_rows();
    $i=0;
    foreach($query->result() as $row){
      $data['id_berita'][$i] = $row->id_berita;
      $data['topik_berita'][$i]= $row->topik_berita;
      $i++;
    }
    $this->load->view('wawancara',$data);
  }

  public function liputan_lapangan(){
    $this->check_login();
    $query=$this->M_berita->get();
    $data['jml'] = $query->num_rows();
    $i=0;
    foreach($query->result() as $row){
      $data['id_berita'][$i] = $row->id_berita;
      $data['topik_berita'][$i]= $row->topik_berita;
      $i++;
    }
    $this->load->view('liputan_lapangan',$data);
  }

  public function press_release(){
    $this->check_login();
    $query=$this->M_berita->get();
    $data['jml'] = $query->num_rows();
    $i=0;
    foreach($query->result() as $row){
      $data['id_berita'][$i] = $row->id_berita;
      $data['topik_berita'][$i]= $row->topik_berita;
      $i++;
    }

    // untuk sub topik_berita
    $query_topik = $this->M_berita->get_all_sub_topik();
		$data['jml_sub_topik'] = $query_topik->num_rows();
		$i=0;
		foreach($query_topik->result() as $row){
			$data['id_sub_topik'][$i] = $row->id_sub_topik;
			$data['id_berita_sub'][$i] = $row->id_berita;
			$data['nama_sub_topik'][$i] = $row->nama_sub_topik;
			$i++;
		}
    $this->load->view('press_release',$data);
  }

  public function konferensi_pers(){
    $this->check_login();
    $query=$this->M_berita->get();
    $data['jml'] = $query->num_rows();
    $i=0;
    foreach($query->result() as $row){
      $data['id_berita'][$i] = $row->id_berita;
      $data['topik_berita'][$i]= $row->topik_berita;
      $i++;
    }
    $this->load->view('konferensi_pers',$data);
  }

  public function diskusi_media(){
    $this->check_login();
    $query=$this->M_berita->get();
    $data['jml'] = $query->num_rows();
    $i=0;
    foreach($query->result() as $row){
      $data['id_berita'][$i] = $row->id_berita;
      $data['topik_berita'][$i]= $row->topik_berita;
      $i++;
    }
    $this->load->view('diskusi_media',$data);
  }

  public function grafik(){
    
  }

}
