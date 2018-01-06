<?php defined('BASEPATH') or exit('No Direct Script Access Allowed!');

/**
* 
*/
class Login extends CI_Controller
{
	
	public function index(){
		$title = "Login - Orderan Khusus SCM";
		$id = $this->session->userdata('id_user');
		if($id == false) {
			$valid = $this->form_validation;
			$valid->set_rules('username', 'Username', 'required');
			$valid->set_rules('password', 'Password', 'required');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if($valid->run()){
				$this->library_login->login($username, $password);
			}

			$this->load->view('form_login', compact('title'));
		} else {
			redirect(base_url('admin'));
		}
		
	}

	public function logout(){
		$this->load->model('Login_model');
		$this->Login_model->logout();
		redirect(base_url());
	}
}

 ?>