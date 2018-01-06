<?php defined('BASEPATH') or exit();

	

  class Library_login 
  {
  	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

  	public function login($username, $password)
  	{
  		$query = $this->CI->db->get_where('user', array(
										'username' => $username,
										'password' => sha1($password)
										));
		if($query->num_rows() == 1){
			$row = $this->CI->db->query('SELECT * FROM user WHERE username = "'.$username.'" ');
			$user = $row->row();
			$data = [
		        'id_user' => $user->id_user,
		        'username' => $user->username,
		        'privilege' => $user->privilege,
		      ];

			$this->CI->session->set_userdata($data);
			

			redirect(base_url('admin'));
		} else {
			$this->CI->session->set_flashdata('error', 'Username atau password salah');
			redirect(base_url('login'));
		}
		return false;
  	}
  }  
	
?>