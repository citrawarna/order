<?php defined('BASEPATH') or exit(); 

/**
* 
*/
class Home extends CI_Controller
{
	
	public function index($page = null){
		$per_halaman = 20;
		//menghitung offset (data dalam table)
		if($page == null) {
			$offset = 0;
		} else {
			$offset = ($page * $per_halaman) - $per_halaman;
		}

		//data order
		$data = $this->db->join('user', 'user.id_user = order.id_user')->order_by('tanggal', 'desc')
						->limit($per_halaman, $offset)
						->get('order')
						->result_array();
		$jumlah = $this->db->get('order')->num_rows();

		//pagination links
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/');
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $per_halaman;
		$config['use_page_numbers'] = true;
		$config['first_link'] = '<div class="page-link">First</div>';
		$config['last_link'] = '<div class="page-link">Last</div>';
		$config['next_link'] = '<div class="page-link">&raquo;</div>';
		$config['prev_link'] = '<div class="page-link">&laquo; </div>';
		$config['cur_tag_open'] = '<li class="page-link bg-primary" style="color:white"><span class="sr-only">(current)</span>';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="page-link">';
		$config['num_tag_close'] = '</li>';		
		
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		
		$title = "Orderan Khusus SCM";
		$this->load->view('index', compact('view', 'title', 'data', 'pagination'));
	}
}

?>