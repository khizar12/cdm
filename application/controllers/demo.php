<?php  

/**
 * 
 */
class Demo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('demo/create');
	}

	function create(){
		$data = array(
			'name'  => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'bmi'   => $this->input->post('bmi'),
			'dm'    => $this->input->post('comorbidities-dm')
        );
      	$this->db->insert('demo_table', $data);


      echo 'Added successfully.';  
	}
}

?>