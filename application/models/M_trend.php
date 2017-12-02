<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_trend extends CI_Model {



	public function __construct()
	{
		parent::__construct();

	}

	function get_all_sort(){
    return $this->db->query('select topik_berita,count(isi_berita.id_berita) as total from isi_berita,topik_berita where isi_berita.id_berita=topik_berita.id_berita GROUP BY isi_berita.id_berita order by total DESC');
  }



}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */
