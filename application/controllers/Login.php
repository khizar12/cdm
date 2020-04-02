<?php 

/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('Login/index');

		if($this->input->post('btnSignIn')){
			$username	= $this->input->post('login-username');
			$password	= md5($this->input->post('login-password'));

			$result = $this->login_model->login($username,$password);

			if($result != null){
				foreach ($result as $row){ 
					$user_details = $this->login_model->get_user_details_by_id($row->id);
					foreach ($user_details as $value) {
						$sessionData = array(
										'user_type'		=> $row->user_type,
										'user_id'     	=> $value->user_id,
										'first_name'  	=> $value->first_name,
										'user_code'		=> $value->user_code
										);
					}
					$this->session->set_userdata($sessionData);
				}
				redirect('dashboard/index');
			}else{
				$this->session->set_flashdata('error','Invalid Username or Password');
				redirect('Login');
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login/index');
	}
}

?>