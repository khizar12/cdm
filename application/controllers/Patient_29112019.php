<?php  

/**
 * 
 */
class Patient extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('patient_model');
	}

	public function index()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$user_id = $this->session->userdata('user_id');
			$data['result'] = $this->patient_model->getPatientDataByUserId($user_id);

			$this->load->view('Patient/index',$data);
		}
	}

	public function create()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$this->load->view('Patient/create');
		}
	}

	public function edit()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$this->load->view('Patient/edit');
		}
	}

	public function ajaxRequestPost()
	{
		$patient_data = array(
			'user_id'        => $this->session->userdata('user_id'),
			'group_number'   => $this->input->post('group'),                             
			'code'           => $this->input->post('code'),                              
			'patient_age'    => $this->input->post('age'),                               
			'patient_sex'    => $this->input->post('gender'),                              
			'patient_height' => $this->input->post('height'),                          
			'patient_weight' => $this->input->post('weight'),                             
			'bmi'            => $this->input->post('bmi'),                               
		);

		$this->db->insert('patient_data',$patient_data);
		$patient_id = $this->db->insert_id();

		$pre_operative_data = array(
			'patient_id'          => $patient_id,
			'dm'                  => $this->input->post('comorbidities-dm'),                  
			'htn'                 => $this->input->post('comorbidities-htn'),                 
			'ihd'                 => $this->input->post('comorbidities-ihd'),                 
			'thyroid_disorder'    => $this->input->post('comorbidities-thyroid-disorder'),    
			'neurogenic_disorder' => $this->input->post('comorbidities-neurogenic-disorder'), 
			'others'              => $this->input->post('others'),                   
			'uti'                 => $this->input->post('uti'),                               
			'medication'          => $this->input->post('medication'),                        
			'side'                => $this->input->post('side'),                              
			'number_of_stones'    => $this->input->post('number-of-stones'),                  
			'hydronephrosis'      => $this->input->post('hydronephrosis'),  
		);   
		$this->db->insert('pre_operative_data',$pre_operative_data);
		$pre_operative_id = $this->db->insert_id();

		$stone_data = $this->input->post('stone_data');
		$count = 1;
		$stone_key = 0;
		foreach ($stone_data as $key => $value) {
			$stoneData = array(
							'patient_id'	=> $patient_id,
							'stone_count' 	=> $count,
							'length'		=> $value['length'],
							'width'			=> $value['width'],
							'volume'		=> $value['volume'],
							'hounsfield'	=> $value['hu'],
							);	
			$this->db->insert('stone',$stoneData);
			$count++;
			
			// echo "<pre>"; print_r($stone_data['length']); echo "</pre>";
			
			// $stone_key++;
		}

		// echo "<pre>"; print_r($stone_data); echo "</pre>";

		$sendData = array(
							'patient_id' => $patient_id, 
							'pre_operative_id' => $pre_operative_id, 
						);
		// print_r($sendData);
		echo json_encode($sendData);

		// echo "<pre>"; print_r($_POST); echo "</pre>";
	}

	public function updateAjaxRequestPost()
	{
		$update_pre_operative_data 	= 	array(
											'reusable_scope_2'  => $this->input->post('reusable-scope'),
										);

		$this->db->where('id', $this->input->post('pre_operative_id'));
		$this->db->update('pre_operative_data', $update_pre_operative_data);

		echo "<pre>"; print_r($_POST); echo "</pre>";
	}

	public function addOperativeData()
	{
		$add_operative_data = 	array(
					'patient_id'							=> $this->input->post('patient_id'),
					'date_of_surgery'                       => date('Y-m-d',strtotime($this->input->post('date-of-surgery'))),         
					'anesthesia'                            => $this->input->post('anesthesia'),                           
					'prophylactic_antibiotic'              	=> $this->input->post('prophylactic-antibiotic'),              
					'prophylactic_antibiotic_amoxicillin'   => $this->input->post('prophylactic-antibiotic-amoxicillin'),  
					'prophylactic_antibiotic_cephalosporin' => $this->input->post('prophylactic-antibiotic-cephalosporin'),
					'prophylactic_antibiotic_others'        => $this->input->post('prophylactic-antibiotic-others'),       
					'pre_stented'                           => $this->input->post('pre-stented'),                          
					'pre_stended_no_of_days'                => $this->input->post('pre_stended_no_of_days'),               
					'pre_stended_reason'                    => $this->input->post('pre_stended_reason'),                   
					'access_sheeth'                         => $this->input->post('access-sheeth'),                        
					'access_sheeth_size'                    => $this->input->post('access-sheeth-size'),                   
					'access_sheeth_length'                  => $this->input->post('access-sheeth-length'),                 
					'safety_wire'                           => $this->input->post('safety-wire'),                          
					'laser_type'                            => $this->input->post('laser_type'),                           
					'laser_machine'                         => $this->input->post('laser-machine'),                        
					'laser_fiber_size'                      => $this->input->post('laser-fiber-size'),                     
					'laser_mode'                            => $this->input->post('laser_mode'),                           
					'basket_size'                           => $this->input->post('basket-size'),                          
					'basket_type'                           => $this->input->post('basket-type'),                          
					'irrigation_type'                       => $this->input->post('irrigation_type'),                      
					'irrigation_type_others'                => $this->input->post('irrigation_type_others'),               
					'irrigation_temprature'                 => $this->input->post('irrigation_temprature'),                
					'irrigation_delivery'                   => $this->input->post('irrigation_delivery'),                  
					'post_stenting'                         => $this->input->post('post-stenting'),                        
					'post_stenting_type'                    => $this->input->post('post_stenting_type'),                   
					'post_stending_length'                  => $this->input->post('post-stending-length'),                 
					'post_stending_diameter'                => $this->input->post('post-stending-diameter'),               
					'post_stenting_reason'                  => $this->input->post('post_stenting_reason'),                        
					'complications'                         => $this->input->post('complications'),                        
					'complications_perforation'             => $this->input->post('complications_perforation'),            
					'complications_bleeding'                => $this->input->post('complications_bleeding'),               
					'complications_others'                  => $this->input->post('complications_others'),                 
					'operative_time'                        => $this->input->post('operative-time'),                       
					'lasing_time'                           => $this->input->post('lasing-time'),                          
					'maneuverability_value'                 => $this->input->post('maneuverability_value'),                
					'image_quality_value'                   => $this->input->post('image_quality_value'),                  
					'ergonomics_value'                      => $this->input->post('ergonomics_value'),                     
					'overall_satisfaction_value'            => $this->input->post('overall_satisfaction_value'),           
				);
		$this->db->insert('operative_data',$add_operative_data);
		// date('Y-m-d',strtotime()
		echo "<pre>"; print_r($_POST); echo "</pre>";
	}

	public function addEarlyPostOperativeData()
	{
		$earlyPostOperativeData = 	array(
								'patient_id'						=> $this->input->post('patient_id'),
								'hospital_stay'                    	=> $this->input->post('hospital_stay'),
								'narcotics'                        	=> $this->input->post('narcotics'),
								'post_operation_anitbiotic'        	=> $this->input->post('post_operation_anitbiotic'),
								'post_operation_anitbiotic_others' 	=> $this->input->post('post_operation_anitbiotic_others'),
								'fever'                            	=> $this->input->post('fever'),
								'pain'                             	=> $this->input->post('pain'),
								'hematuria'                        	=> $this->input->post('hematuria'),
								'uti'                              	=> $this->input->post('early-post-operative-complications-uti'),
								'sepsis'                           	=> $this->input->post('sepsis'),
								'others'                           	=> $this->input->post('early_post_operative_complications_others'),
								'emergency_visit'                  	=> $this->input->post('emergency-visit'),
								'emergency_visit_reason'           	=> $this->input->post('emergency_visit_reason'),
								're_admission'                     	=> $this->input->post('re-admission'),
								're_admission_reason'              	=> $this->input->post('re_admission_reason')
									);

		$this->db->insert('early_post_operative',$earlyPostOperativeData);
		echo "<pre>"; print_r($earlyPostOperativeData); echo "</pre>";
	}
}

?>