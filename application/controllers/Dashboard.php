<?php 

/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{	
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$user_id = $this->session->userdata('user_id');
			$data['result'] = $this->dashboard_model->getUserByUserId($user_id);
			$data['pageID'] = 1;
			$data['title']	= 'Dashboard';

			$this->load->view('Dashboard/index',$data);
		}
		
	}
}

?>