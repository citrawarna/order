<?php defined('BASEPATH') or exit();

class Admin extends CI_Controller 
{	
	public function index($page = null){
		$login = $this->session->userdata('id_user');
		if(!$login) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$per_halaman = 20;
		//menghitung offset (data dalam table)
		if($page == null) {
			$offset = 0;
		} else {
			$offset = ($page * $per_halaman) - $per_halaman;
		}

		//data order
		$data = $this->db->join('user', 'user.id_user = order.id_user')
						//->join('konfirmasi', 'konfirmasi.id_order = order.id_order')
						->order_by('tanggal', 'desc')
						->limit($per_halaman, $offset)
						->get('order')
						->result_array();
		$jumlah = $this->db->get('order')->num_rows();

		//pagination links
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/');
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

		$title = "Dashboard - Orderan Khusus SCM";
		$view = 'admin';
		$this->load->view('layout/template', compact('view', 'title', 'data', 'pagination', 'detail'));
	}

	public function tambah(){
		//mengecek login
		$user = $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		if(!$user) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$validasi = array(
			array('field' => 'id_order[]', 'rules' => 'trim'),
			array('field' => 'tanggal[]', 'rules' => 'trim|required'),
			array('field' => 'id_user[]', 'rules' => 'trim|required'),
			array('field' => 'nama_barang[]', 'rules' => 'trim|required'),
			array('field' => 'jumlah[]', 'rules' => 'trim|required'),
			array('field' => 'kemasan[]', 'rules' => 'trim|required'),
			array('field' => 'cabang[]', 'rules' => 'trim|required'),
			array('field' => 'pemesan[]', 'rules' => 'trim|required'),
			array('field' => 'keterangan[]', 'rules' => 'trim'),
		);

		$input = $this->form_validation->set_rules($validasi);
		if($input->run() == true){
			$insert = $this->input;
			$id_order = $insert->post('');
			$tanggal = $insert->post('tanggal[]');
			$id_user = $insert->post('id_user[]');
			$nama_barang = $insert->post('nama_barang[]');
			$jumlah = $insert->post('jumlah[]');
			$kemasan = $insert->post('kemasan[]');
			$cabang = $insert->post('cabang[]');
			$pemesan = $insert->post('pemesan[]');
			$keterangan = $insert->post('keterangan[]');
			$value = array();

			for($i = 0; $i<count($tanggal); $i++) {
				$value[$i] = array(
					'tanggal' => $tanggal[$i],
					'id_user' => $id_user[$i],
					'nama_barang' => $nama_barang[$i],
					'jumlah' => $jumlah[$i],
					'kemasan' => $kemasan[$i],
					'cabang' => $cabang[$i],
					'pemesan' => $pemesan[$i],
					'keterangan' => $keterangan[$i],
					);
			}

			$this->db->insert_batch('order', $value);
			$this->session->set_flashdata('success', ''.$i.' Data order berhasil ditambah');
			redirect('admin');
		}


		$title = "Tambah - Orderan Khusus SCM";
		$view = 'proses/form_input';
		$this->load->view('layout/template', compact('title', 'view', 'user', 'username'));
	}

	public function edit($id = null){
		//mengecek login
		$user = $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		if(!$user) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$this->load->model('admin_model');
		$order = $this->admin_model->get($id);
		if(!$order) {
			redirect('admin');
		}

		if(!$_POST){
			$input = $order;
			$view = 'proses/form_edit';
			$title = "Edit - Orderan Khusus SCM";
			$this->load->view('layout/template', compact('view', 'input', 'title', 'user', 'username'));
		} else {
			$insert = $this->input;
			$input = array(			
				'tanggal' => $insert->post('tanggal'),
				'id_user' => $insert->post('id_user'),
				'nama_barang' => $insert->post('nama_barang'),
				'jumlah' => $insert->post('jumlah'),
				'kemasan' => $insert->post('kemasan'),
				'cabang' => $insert->post('cabang'),
				'pemesan' => $insert->post('pemesan'),
				'keterangan' => $insert->post('keterangan')
			);

			$this->admin_model->update($id, $input);
			$this->session->set_flashdata('success', 'Data Berhasil Diedit!');
			redirect('admin');
		}
	}

	public function proses(){
		//mengecek login
		$user = $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		if(!$user) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$this->load->model('admin_model');

		$post = $this->input->post();
		$check = $post['check'];

		if(isset($check)){
			if(isset($post['hapus'])) {
				$this->admin_model->post_delete($post);

				$this->session->set_flashdata('success', ''.count($check). ' Data Berhasil dihapus');
				redirect('admin');
			} else if(isset($post['proses'])) {
				$query = $this->admin_model->get_proses($post)->result_array();
				//$query2 = $this->admin_model->get_proses($post)->row_array();

				//$querykonf = $this->db->join('order', 'order.id_order = konfirmasi.id_order')->where('konfirmasi.id_order', $query2['id_order'])->get('konfirmasi')->row_array();
				
				$title = 'Proses - Orderan Khusus SCM';
				$view = 'proses/form_proses';
				$this->load->view('layout/template', compact('view', 'title', 'query', 'querykonf'));
			}

		} else {
			$this->session->set_flashdata('error', 'Harap check data terlebih dahulu');
			redirect('admin');
		}
	}

	public function simpan_proses() {
		$this->load->model('admin_model');
		
		$insert = $this->input;
		$id_konfirmasi = $insert->post('id_konfirmasi[]');
		$id_order = $insert->post('id_order[]');
		$tanggal_konfirm = $insert->post('tanggal_konfirm[]');
		$status = $insert->post('status[]');
		$jadi = $insert->post('jadi[]');
		$dari = $insert->post('dari[]');
		$waktu_spesifik = $insert->post('waktu_spesifik[]');
		$keterangan_konfirm = $insert->post('keterangan_konfirm[]');
		$progress = $insert->post('progress[]');

		$value = array();
		
		for($i = 0; $i<count($id_order); $i++) {
			$value[$i] = array(
				'id_konfirmasi' => $id_konfirmasi[$i],
				'id_order' => $id_order[$i],
				'tanggal_konfirm' => $tanggal_konfirm[$i],				
				'status' => $status[$i],
				'jadi' => $jadi[$i],
				'dari' => $dari[$i],
				'waktu_spesifik' => $waktu_spesifik[$i],
				'keterangan_konfirm' => $keterangan_konfirm[$i],
				'progress' => $progress[$i]			
			);
			//big thanks to surya karena sudah membantu menyelesaikan fungsi ini
			$has_confirm = $this->db->query("select count(*) from konfirmasi where id_konfirmasi = '".$id_konfirmasi[$i]."'")->row_array();

			if ($has_confirm['count(*)'] == 0) {
				$this->db->insert_batch('konfirmasi', array([
					'id_order' => $id_order[$i],
					'tanggal_konfirm' => $tanggal_konfirm[$i],				
					'status' => $status[$i],
					'jadi' => $jadi[$i],
					'dari' => $dari[$i],
					'waktu_spesifik' => $waktu_spesifik[$i],
					'keterangan_konfirm' => $keterangan_konfirm[$i],
					'progress' => $progress[$i]	
				]));	
			}
		
		}
		//jika count nya 1 (atau sudah memiliki id_konfirmasi) 
		$this->db->update_batch('konfirmasi', $value, 'id_konfirmasi');

		$this->session->set_flashdata('success', ''.$i.' Data order berhasil diproses');
		redirect('admin');
	}

	public function search($page = null){
		//mengecek login
		$user = $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		if(!$user) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$keywords = $this->input->get('keywords', true);
		$data = $this->db->where('cabang', $keywords)
						->or_like('nama_barang', $keywords)
						->order_by('tanggal', 'desc')
						->join('user','user.id_user = order.id_user')
						->get('order')
						->result_array();

		$jml = $this->db->where('cabang', $keywords)
						->or_like('nama_barang', $keywords)
						->order_by('tanggal', 'desc')
						->join('user','user.id_user = order.id_user')
						->get('order')
						->result_array();

		$jumlah = count($jml);

		if(!$data) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(base_url('admin'));
		} else if($keywords == '') {
			$this->session->set_flashdata('error', 'Mohon mengetikan nama barang / cabang');
			redirect(base_url('admin'));
		}

		//PAGINATION HANYA UNTUK MENUTUPI ERROR PADA VIEW (TIDAK BERFUNGSI)
			$per_halaman = count($jml);
			//menghitung offset (data dalam table)
			if($page == null) {
				$offset = 0;
			} else {
				$offset = ($page * $per_halaman) - $per_halaman;
			}

		//pagination links
			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/');
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


		$title = "Dashboard - Orderan Khusus SCM";
		$view = 'admin';
		$this->load->view('layout/template', compact('view', 'title', 'data', 'pagination'));
	}

	public function tanggal($page = null){
		$user = $this->session->userdata('id_user');
		$username = $this->session->userdata('username');
		if(!$user) {
			$this->session->set_flashdata('error', 'Harap login terlebih dahulu!');
			redirect('login');
		}

		$dari = $this->input->get('dari', true);
		$sampai = $this->input->get('sampai', true);

		$data = $this->db->where('tanggal >=', $dari)
						->where('tanggal <=', $sampai)
						->order_by('tanggal', 'desc')
						->join('user', 'user.id_user = order.id_user')
						->join('konfirmasi', 'konfirmasi.id_order = order.id_order','LEFT')
						->get('order')
						->result_array();

		$jumlah = count($data);
		//$data = $this->db->query("SELECT * FROM order WHERE tanggal BETWEEN $dari AND $sampai ")->result_array();

		//PAGINATION HANYA UNTUK MENUTUPI ERROR PADA VIEW (TIDAK BERFUNGSI)
			$per_halaman = $jumlah;
			//menghitung offset (data dalam table)
			if($page == null) {
				$offset = 0;
			} else {
				$offset = ($page * $per_halaman) - $per_halaman;
			}

		//pagination links
			$this->load->library('pagination');
			$config['base_url'] = base_url('admin/');
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

		if(!$data){
			$this->session->set_flashdata('error', 'Mohon memasukan tanggal yang valid!');
			redirect('admin');
		} 

		$title = "Dashboard - Orderan Khusus SCM";
		$view = 'admin';
		$this->load->view('layout/template', compact('view', 'title', 'data', 'pagination'));
	}

}


 ?>