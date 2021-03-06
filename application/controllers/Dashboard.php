<?php
	
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Cabang3 status
 */
class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
		$this->load->model('M_narasumber');
	}
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
	public function index()
	{
		if($this->session->userdata('login')==TRUE && $this->session->userdata('user')=='administrator'){
			// $this->load->view('templates/script_header');
			$query=$this->M_berita->get();
			$data['jml'] = $query->num_rows();
			$i=0;
			foreach($query->result() as $row){
				$data['id_berita'][$i] = $row->id_berita;
				$data['topik_berita'][$i]= $row->topik_berita;
				$i++;
			}
			$this->load->view('dashboard',$data);
		}else{
			$data['message']=$this->session->flashdata('message');
			$data['action']='Login/process_login_admin';
			// $this->load->view('templates/script_header');
			$this->load->view('index',$data);
		}
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


	public function media(){

		$this->check_login();
		// $this->load->view('templates/script_header');
		$query=$this->M_berita->get();
		$data['jml'] = $query->num_rows();
		$i=0;
		foreach($query->result() as $row){
			$data['id_berita'][$i] = $row->id_berita;
			$data['topik_berita'][$i]= $row->topik_berita;
			$i++;
		}
		$this->load->view('media_title',$data);
		// $this->load->view('templates/script_footer');



	}

	public function trend(){

		$this->check_login();
		// $this->load->view('templates/script_header');
		$query=$this->M_berita->get();
		$data['jml'] = $query->num_rows();
		$i=0;
		foreach($query->result() as $row){
			$data['id_berita'][$i] = $row->id_berita;
			$data['topik_berita'][$i]= $row->topik_berita;
			$i++;
		}
		$this->load->view('trend_berita',$data);

	}

	public function grafik(){
		$this->check_login();
		$query=$this->M_berita->get();
		$data['jml'] = $query->num_rows();
		$i=0;
		foreach($query->result() as $row){
			$data['id_berita'][$i] = $row->id_berita;
			$data['topik_berita'][$i]= $row->topik_berita;
			$i++;
		}
		$this->load->view('grafik',$data);


	}

	public function post(){

		$this->check_login();
		$query_topik = $this->M_berita->get_all_sub_topik();
		$data['jml_sub_topik'] = $query_topik->num_rows();
		$i=0;
		foreach($query_topik->result() as $row){
			$data['id_sub_topik'][$i] = $row->id_sub_topik;
			$data['id_berita_sub'][$i] = $row->id_berita;
			$data['nama_sub_topik'][$i] = $row->nama_sub_topik;
			$i++;
		}

		// buat ambil berita
		$query=$this->M_berita->get();
		$data['jml'] = $query->num_rows();
		$i=0;
		foreach($query->result() as $row){
			$data['id_berita'][$i] = $row->id_berita;
			$data['topik_berita'][$i]= $row->topik_berita;
			$i++;
		}
		// buat ambil media
		$query2=$this->M_berita->get_media();
		$data['jml_media'] = $query2->num_rows();
		$i=0;
		foreach($query2->result() as $row){
			$data['id_media'][$i] = $row->id_media;
			$data['nama_media'][$i]= $row->nama_media;
			$i++;
		}
		// buat ambil narasumber
		$query3=$this->M_narasumber->get_narasumber();
		$data['jml_narasumber'] = $query3->num_rows();
		$i=0;
		foreach($query3->result() as $row){
			$data['id_narasumber'][$i] = $row->id_narasumber;
			$data['nama_narasumber'][$i] = $row->nama_narasumber;
			$i++;
		}

		$data['message']=$this->session->flashdata('message');
		$this->load->view('post_berita',$data);

	}

	public function load_rss(){
		$this->load->view('native/get_rss');
	}


}
