<?php defined('BASEPATH') or exit();

class Login_model extends CI_Model
{
	
	public function logout(){
		$this->session->unset_userdata();
		$this->session->sess_destroy();
	}
}

 ?>