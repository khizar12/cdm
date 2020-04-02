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
		$this->load->model('login_model');
		$this->load->model('dashboard_model');
		$this->load->library('email');
		$this->load->library('ajax_pagination');  // Load pagination library
		$this->perPage = 2;  // Per page limit
	}

	public function index()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$user_id 	= $this->session->userdata('user_id');
			$user_type 	= $this->session->userdata('user_type');

			$data['pageID'] = 3;
			$data['title']	= 'View All Patients';
			$data['result'] = $this->patient_model->getPatientDataByUserId($user_id,$user_type);

			$this->load->view('Patient/index',$data);
		}
	}

	public function index_test()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$data                  = array(); 
			$user_id               = $this->session->userdata('user_id');
			$user_type             = $this->session->userdata('user_type');

			$data['pageID'] = 4;
			$data['title']	= 'All Patients Data';

			$conditions['user_id'] = $user_id;
			if(isset($user_type) && $user_type  != 1){
				$conditions['where']['patient_data.user_id']  =$user_id;
			}

			// Get record count 
			$conditions['returnType'] = 'count'; 
			$totalRec                 = $this->patient_model->getRows($conditions);

			// Pagination configuration 
			$config['target']         = '#dataList'; 
			$config['total_rows']     = $totalRec; 
			$config['per_page']       = $this->perPage; 
			$config['link_func']      = 'searchFilter';

			// Initialize pagination library 
			$this->ajax_pagination->initialize($config); 
			
			$conditions2['user_id']   = $user_id;
			
			if(isset($user_type) && $user_type != 1){
				$conditions2['where']['patient_data.user_id'] = $user_id;
			}
			
			$conditions2['limit'] = $this->perPage;
			$data['posts']        = $this->patient_model->getRows($conditions2); 

			$this->load->view('Patient/index_test',$data);
		}
	}

	function ajaxPaginationData(){ 
        // Define offset 
		$page    	= $this->input->post('page'); 
		(!$page) ? $offset = 0 : $offset = $page ;
		
		// Set conditions for search and filter 
		$keywords	= $this->input->post('keywords'); 
		$sortBy  	= $this->input->post('sortBy'); 

        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->patient_model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
		$conditions['start'] = $offset; 
		$conditions['limit'] = $this->perPage; 
		unset($conditions['returnType']); 
		$data['posts']       = $this->patient_model->getRows($conditions); 

        // Load the data list view 
        $this->load->view('Patient/ajax-data', $data, false); 
    } 

	public function create()
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$user_id = $this->session->userdata('user_id');

			$data['pageID']       = 2;
			$data['title']        = 'Add New Patient';
			$data['user_detail']  = $this->login_model->get_user_details_by_id($user_id);
			$data['group_number'] = $this->patient_model->getLastGroupNumberByUserID($user_id);
			$data['patient_data'] = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('patient_data')->row();

			// echo "<pre>"; print_r($data); echo "</pre>";
			$this->load->view('Patient/create',$data);
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$patient_id                        = $id;//$this->input->get('pid');
			$data['patient_data']              = $this->patient_model->getPatientDataByPatientID($patient_id);
			$data['pre_operative_data']        = $this->patient_model->getPreOperativeDataByPatientID($patient_id);
			$data['operative_data']            = $this->patient_model->getOperativeDataByPatientID($patient_id);
			$data['early_post_operative_data'] = $this->patient_model->getEarlyPostOperativeDataByPatientID($patient_id);
			$data['stone_data']                = $this->patient_model->getStoneDataByPatientID($patient_id);
			$data['pre_laboratory_tests']      = $this->patient_model->getLaboratoryTestsByPatientID($patient_id);
			$data['pre_laboratory_tests']      = $this->patient_model->getLaboratoryTestsByPatientID($patient_id);
			$data['follow_up_data']            = $this->patient_model->getFollowUpDataByPatientID($patient_id);
			$data['follow_up_data_2']          = $this->patient_model->getFollowUpData2ByPatientID($patient_id);
			$data['follow_up_data_3']          = $this->patient_model->getFollowUpData3ByPatientID($patient_id);
			$data['patient_id']                = $id;

			$data['pageID'] = 4;
			$data['title']	= 'Update Patient';
			$this->load->view('Patient/edit',$data);
		}
	}

	public function delete($id)
	{
		if($this->session->userdata('user_id') == ''){
			$this->session->set_flashdata('error','Not authorized');
			redirect('Login');
		}else{
			$patient_id                        = $id;
			$delSuccess = $this->patient_model->deletePatientByPatientId($patient_id);
			if($delSuccess){
				$this->session->set_flashdata('delSuccess','Patient data deleted successfully!');
				redirect('Patient/index');
			}
		}
	}

	public function image_file_upload($file_name,$tmp_name){
		if($file_name != ""){
			unlink(theme_folder_path."uploads/".$file_name);
			move_uploaded_file($tmp_name,theme_folder_path."uploads/".$file_name);
			return $file_name;
		}		
	}

	public function ajaxRequestPost()
	{
		$patient_data = array(
			'user_id'           => $this->session->userdata('user_id'),
			'group_number'      => $this->input->post('group'),                             
			'code'              => $this->input->post('code'),
			'patient_reference' => $this->input->post('patient_reference'),                              
			'patient_age'       => $this->input->post('age'),                               
			'patient_sex'       => $this->input->post('gender'),                              
			'patient_height'    => $this->input->post('height'),                          
			'patient_weight'    => $this->input->post('weight'),                             
			'bmi'               => $this->input->post('bmi'),                               
		);

		$this->db->insert('patient_data',$patient_data);
		$patient_id = $this->db->insert_id();

		$xray_image = $this->image_file_upload($_FILES['xray']['name'],$_FILES['xray']['tmp_name']);
		$us_image   = $this->image_file_upload($_FILES['us']['name'],$_FILES['us']['tmp_name']);
		$ct_image   = $this->image_file_upload($_FILES['ct']['name'],$_FILES['ct']['tmp_name']);

		$pre_operative_data = array(
			'patient_id'           	=> $patient_id,
			'dm'                   	=> $this->input->post('comorbidities-dm'),                  
			'htn'                  	=> $this->input->post('comorbidities-htn'),                 
			'ihd'                  	=> $this->input->post('comorbidities-ihd'),                 
			'thyroid_disorder'     	=> $this->input->post('comorbidities-thyroid-disorder'),    
			'neurogenic_disorder'  	=> $this->input->post('comorbidities-neurogenic-disorder'), 
			'others'               	=> $this->input->post('others'),                   
			'uti'                  	=> $this->input->post('uti'),
			'uti_treated'           => $this->input->post('uti-treated'),
			'uti_treatment'         => $this->input->post('uti-treatment'),
			'medication'           	=> $this->input->post('medication'), 
			'xray'           		=> $xray_image,
			'us'           			=> $us_image,
			'ct'           			=> $ct_image,
			'side'                 	=> $this->input->post('side'),                              
			'number_of_stones'     	=> $this->input->post('number-of-stones'),                  
			'hydronephrosis'       	=> $this->input->post('hydronephrosis'),                 
			'stones_contralateral' 	=> $this->input->post('stones-contralateral'), 
			'status'               	=> 1 
		);   
		$this->db->insert('pre_operative_data',$pre_operative_data);
		$pre_operative_id = $this->db->insert_id();
		
		$creatinine_image = $this->image_file_upload($_FILES['creatinine-image']['name'],$_FILES['creatinine-image']['tmp_name']);
		$urea_image       = $this->image_file_upload($_FILES['urea-image']['name'],$_FILES['urea-image']['tmp_name']);
		$calcium_image    = $this->image_file_upload($_FILES['calcium-image']['name'],$_FILES['calcium-image']['tmp_name']);
		$uric_acid_image  = $this->image_file_upload($_FILES['uric-acid-image']['name'],$_FILES['uric-acid-image']['tmp_name']);
		$urine_image      = $this->image_file_upload($_FILES['urine-image']['name'],$_FILES['urine-image']['tmp_name']);


		$laboratory_tests = array(
			'patient_id' 			=> $patient_id,
			'creatinine' 			=> $this->input->post('creatinine'), 
			'creatinine_image' 		=> $creatinine_image,
			'urea'       			=> $this->input->post('urea'),
			'urea_image' 			=> $urea_image,
			'calcium'    			=> $this->input->post('calcium'),
			'calcium_image' 		=> $calcium_image,
			'uric_acid'  			=> $this->input->post('uric-acid'),
			'uric_acid_image' 		=> $uric_acid_image,
			'urine_image' 			=> $urine_image,
		);
		
		$this->db->insert('pre_laboratory_tests',$laboratory_tests);	

		$stone_data = $this->input->post('stone_data');
		$count = 1;
		$stone_key = 0;
		foreach ($stone_data as $key => $value) {
			$stoneData = array(
							'patient_id'	=> $patient_id,
							'stone_count' 	=> $count,
							'length'		=> $value['length'],
							'width'			=> $value['width'],
							'depth'			=> $value['depth'],
							'volume'		=> $value['volume'],
							'hounsfield'	=> $value['hu'],
							'stone_site'	=> $value['stone_site'],
							);	
			$this->db->insert('stone',$stoneData);
			$count++;
		}
		
		$add_operative_data 	= array( 'patient_id' => $patient_id, 'status' => 0 );
		$this->db->insert('operative_data',$add_operative_data);
		
		$earlyPostOperativeData = array( 'patient_id' => $patient_id, 'status' => 0 );
		$this->db->insert('early_post_operative',$earlyPostOperativeData);

		$follow_up_data 		= array( 'patient_id' => $patient_id, 'status' => 0 );
		$this->db->insert('follow_up',$follow_up_data);

		$follow_up_data_2 		= array( 'patient_id' => $patient_id, 'status' => 0 );
		$this->db->insert('follow_up_2',$follow_up_data_2);

		$follow_up_data_3 		= array( 'patient_id' => $patient_id, 'status' => 0 );
		$this->db->insert('follow_up_3',$follow_up_data_3);

		echo $patient_id;

	}

	public function updateAjaxRequestPost()
	{
		$update_pre_operative_data 	= 	array(
											'reusable_scope_2'  => $this->input->post('reusable-scope'),
										);

		//$this->db->where('id', $this->input->post('pre_operative_id'));
		$this->db->where('patient_id', $this->input->post('patient_id'));
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
	}

	public function updatePreOperativeData()
	{
		$patient_id = $this->input->post('patient_id');

		$patient_data = array(
			'group_number'      => $this->input->post('group_no'),                             
			'code'              => $this->input->post('code'),    
			'patient_reference' => $this->input->post('patient_reference'),                            
			'patient_age'       => $this->input->post('age'),                               
			'patient_sex'       => $this->input->post('gender'),                              
			'patient_height'    => $this->input->post('height'),                          
			'patient_weight'    => $this->input->post('weight'),                             
			'bmi'               => $this->input->post('bmi'),                               
		);
		$this->patient_model->updatePatientData($patient_id,$patient_data);

		$pre_operative_data = array(
			'dm'                   => $this->input->post('comorbidities-dm'),                  
			'htn'                  => $this->input->post('comorbidities-htn'),                 
			'ihd'                  => $this->input->post('comorbidities-ihd'),                 
			'thyroid_disorder'     => $this->input->post('comorbidities-thyroid-disorder'),    
			'neurogenic_disorder'  => $this->input->post('comorbidities-neurogenic-disorder'), 
			'others'               => $this->input->post('others'),                   
			'uti'                  => $this->input->post('uti'),  
			'uti_treated'          => $this->input->post('uti-treated'),
			'uti_treatment'        => $this->input->post('uti-treatment'),
			'medication'           => $this->input->post('medication'),                        
			'side'                 => $this->input->post('side'),                              
			'number_of_stones'     => $this->input->post('number-of-stones'),                  
			'hydronephrosis'       => $this->input->post('hydronephrosis'), 
			'reusable_scope_2'     => $this->input->post('reusable-scope'),               
			'stones_contralateral' => $this->input->post('stones-contralateral'),
			'status'               =>	1  
		);
		$this->patient_model->updatePreOperativeData($patient_id,$pre_operative_data);

		$creatinine_image = $this->image_file_upload($_FILES['creatinine-image']['name'],$_FILES['creatinine-image']['tmp_name']);
		$urea_image       = $this->image_file_upload($_FILES['urea-image']['name'],$_FILES['urea-image']['tmp_name']);
		$calcium_image    = $this->image_file_upload($_FILES['calcium-image']['name'],$_FILES['calcium-image']['tmp_name']);
		$uric_acid_image  = $this->image_file_upload($_FILES['uric-acid-image']['name'],$_FILES['uric-acid-image']['tmp_name']);
		$urine_image      = $this->image_file_upload($_FILES['urine-image']['name'],$_FILES['urine-image']['tmp_name']);

		$laboratory_tests = array(
			'patient_id' 			=> $patient_id,
			'creatinine' 			=> $this->input->post('creatinine'), 
			'creatinine_image' 		=> $creatinine_image,
			'urea'       			=> $this->input->post('urea'),
			'urea_image' 			=> $urea_image,
			'calcium'    			=> $this->input->post('calcium'),
			'calcium_image' 		=> $calcium_image,
			'uric_acid'  			=> $this->input->post('uric-acid'),
			'uric_acid_image' 		=> $uric_acid_image,
			'urine_image' 			=> $urine_image,
		);
		
		$this->patient_model->updateLaboratoryTestsData($patient_id,$laboratory_tests);
	

		$stone_data = $this->input->post('stone_data');
		$count = 1;
		$stone_key = 0;
		if(!empty($stone_data)){
			foreach ($stone_data as $key => $value) {
				$stoneData = array(
								'stone_count' 	=> $count,
								'length'		=> $value['length'],
								'width'			=> $value['width'],
								'depth'			=> $value['depth'],
								'volume'		=> $value['volume'],
								'hounsfield'	=> $value['hu'],
								'stone_site'	=> $value['stone-site'],
								);
				$stone_id = $value['id'];	
				$this->patient_model->updateStoneData($stone_id,$stoneData);
				$count++;
			}
		}
		// echo "<pre>"; print_r($_POST); echo "</pre>";
	}

	public function updateOperativeData()
	{
		$patient_id = $this->input->post('patient_id');
		$add_operative_data = 	array(
			'date_of_surgery'    			  => date('Y-m-d',strtotime($this->input->post('date-of-surgery'))),         
			'anesthesia'          			  => $this->input->post('anesthesia'),
			'prophylactic_antibiotic'      	  => $this->input->post('prophylactic-antibiotic'),
			'prophylactic_antibiotic_additional'   => $this->input->post('prophylactic-antibiotic-additional'),  
			'prophylactic_antibiotic_additional_other' => $this->input->post('prophylactic_antibiotic_additional_other'),
			'pre_stented'                	  => $this->input->post('pre-stented'),                          
			'pre_stended_no_of_days'     	  => $this->input->post('pre_stended_no_of_days'),               
			'pre_stended_reason'         	  => $this->input->post('pre_stended_reason'),                   
			'access_sheeth'              	  => $this->input->post('access-sheeth'),                        
			'access_sheeth_size'         	  => $this->input->post('access-sheeth-size'),                   
			'access_sheeth_length'       	  => $this->input->post('access-sheeth-length'),                 
			'safety_wire'                	  => $this->input->post('safety-wire'),                          
			'laser_type'                 	  => $this->input->post('laser_type'),                           
			'laser_machine'              	  => $this->input->post('laser-machine'),                        
			'laser_fiber_size'           	  => $this->input->post('laser-fiber-size'),                     
  
			'dusting_energy'               	  => $this->input->post('dusting_energy'),
			'dusting_frequency'            	  => $this->input->post('dusting_frequency'),
			'fragmentation_energy'            => $this->input->post('fragmentation_energy'),
			'fragmentation_frequency'         => $this->input->post('fragmentation_frequency'),

			'basket'						  => $this->input->post('basket'),
			'basket_size'                	  => $this->input->post('basket-size'),
			'basket_type'                	  => $this->input->post('basket-type'),

			'irrigation_type'            	  => $this->input->post('irrigation_type'),                      
			'irrigation_type_others'     	  => $this->input->post('irrigation_type_others'),               
			'irrigation_temprature'      	  => $this->input->post('irrigation_temprature'),                
			'irrigation_delivery'        	  => $this->input->post('irrigation_delivery'),                  
			'post_stenting'              	  => $this->input->post('post-stenting'),                        
			'post_stenting_type'         	  => $this->input->post('post_stenting_type'),                   
			'post_stending_length'       	  => $this->input->post('post-stending-length'),                 
			'post_stending_diameter'     	  => $this->input->post('post-stending-diameter'),               
			'post_stenting_reason'			  => $this->input->post('post_stenting_reason'),
			'complications'              	  => $this->input->post('complications'),                        
			'complications_perforation'  	  => $this->input->post('complications_perforation'),            
			'complications_bleeding'     	  => $this->input->post('complications_bleeding'),               
			'complications_others'       	  => $this->input->post('complications_others'),                 
			'operative_time'             	  => $this->input->post('operative-time'),                       
			'lasing_time'                	  => $this->input->post('lasing-time'),                          
			'maneuverability_value'      	  => $this->input->post('maneuverability_value'),                
			'image_quality_value'        	  => $this->input->post('image_quality_value'),                  
			'ergonomics_value'           	  => $this->input->post('ergonomics_value'),                     
			'overall_satisfaction_value' 	  => $this->input->post('overall_satisfaction_value'),
			'status'                     	  => 1           
		);
		$this->patient_model->updateOperativeData($patient_id,$add_operative_data);
	}

	public function updateEarlyPostOperativeData()
	{
		$patient_id = $this->input->post('patient_id');
		$earlyPostOperativeData = 	array(
								'hospital_stay'                    => $this->input->post('hospital_stay'),
								'narcotics'                        => $this->input->post('narcotics'),
								'post_operation_anitbiotic'        => $this->input->post('post_operation_anitbiotic'),
								'post_operation_anitbiotic_others' => $this->input->post('post_operation_anitbiotic_others'),
								'fever'                            => $this->input->post('fever'),
								'pain'                             => $this->input->post('pain'),
								'hematuria'                        => $this->input->post('hematuria'),
								'uti'                              => $this->input->post('early-post-operative-complications-uti'),
								'uti_treated'          			   => $this->input->post('epo-uti-treated'),
								'uti_treatment'          		   => $this->input->post('epo-uti-treatment'),
								'sepsis'                           => $this->input->post('sepsis'),
								'others'                           => $this->input->post('early_post_operative_complications_others'),
								'emergency_visit'                  => $this->input->post('emergency-visit'),
								'emergency_visit_reason'           => $this->input->post('emergency_visit_reason'),
								're_admission'                     => $this->input->post('re-admission'),
								're_admission_reason'              => $this->input->post('re_admission_reason'),
								'status'                           => 1
									);
		$this->patient_model->updateEarlyPostOperativeData($patient_id,$earlyPostOperativeData);
	}

	public function updateFollowUpData()
	{
		$patient_id = $this->input->post('patient_id');
		$followUpData = array(
					'pain'                          => $this->input->post('pain'),
					'luts'                          => $this->input->post('luts'),
					'uti'                           => $this->input->post('uti'),
					'uti_treated'          			=> $this->input->post('f1-uti-treated'),
					'uti_treatment'          		=> $this->input->post('f1-uti-treatment'),
					'hematuria'                     => $this->input->post('hematuria'),
					'others'                        => $this->input->post('follow_up_others'),
					'creatinine'                    => $this->input->post('follow_up_creatinine'),
					'creatinine_image'              => $this->input->post('follow_up_creatinine-image'),
					'urea'                          => $this->input->post('follow_up_urea'),
					'urea_image'                    => $this->input->post('follow_up_urea-image'),
					'urine'                         => $this->input->post('follow_up_urine'),
					'urine_image'                   => $this->input->post('follow_up_urine-image'),
					'xray'                          => $this->input->post('follow_up_xray'),
					'us'                            => $this->input->post('follow_up_us'),
					'ct'                            => $this->input->post('follow_up_ct'),
					'f1_residual_fragment'          => $this->input->post('f1_residual_fragment'),
					'f1_residual_fragment_size'     => $this->input->post('f1_residual_fragment_size'),
					'f1_residual_fragment_location' => $this->input->post('f1_residual_fragment_location'),
					'f1_residual_fragment_number'   => $this->input->post('f1_residual_fragment_number'),
					'stent_removal'                 => $this->input->post('stent_removal'),
					'smooth'                        => $this->input->post('follow_up_smooth'),
					'adverse_event'                 => $this->input->post('follow_up_adverse_event'),
					'office_based'                  => $this->input->post('follow_up_day_care'),
					'day_care'                      => $this->input->post('follow_up_day_care'),
					'flexible_cystoscope'           => $this->input->post('follow_up_flexible_cystoscope'),
					'rigid_cystoscope'              => $this->input->post('follow_up_rigid_cystoscope'),
					'reason'                        => $this->input->post('follow_up_reason'),
					'status'                        => 1
							);
		$this->patient_model->updateFollowUpData($patient_id,$followUpData);
	}

	public function updateFollowUpData2()
	{
		$patient_id = $this->input->post('patient_id');

		$xray_image = $this->image_file_upload($_FILES['follow_up_2_xray']['name'],$_FILES['follow_up_2_xray']['tmp_name']);
		$us_image   = $this->image_file_upload($_FILES['follow_up_2_us']['name'],$_FILES['follow_up_2_us']['tmp_name']);
		$ct_image   = $this->image_file_upload($_FILES['follow_up_2_ct']['name'],$_FILES['follow_up_2_ct']['tmp_name']);

		$followUpData2 = array(
						'pain'                          => $this->input->post('follow_up_2_pain'),
						'luts'                          => $this->input->post('follow_up_2_luts'),
						'uti'                           => $this->input->post('follow_up_2_uti'),
						'uti_treated'          			=> $this->input->post('f2-uti-treated'),
						'uti_treatment'          		=> $this->input->post('f2-uti-treatment'),
						'hematuria'                     => $this->input->post('follow_up_2_hematuria'),
						'others'                        => $this->input->post('follow_up_2_others'),
						'xray'                          => $xray_image,
						'us'                            => $us_image,
						'ct'                            => $ct_image,
						'f2_residual_fragment'          => $this->input->post('f2_residual_fragment'),
						'f2_residual_fragment_size'     => $this->input->post('f2_residual_fragment_size'),
						'f2_residual_fragment_location' => $this->input->post('f2_residual_fragment_location'),
						'f2_residual_fragment_number'   => $this->input->post('f2_residual_fragment_number'),
						'stent_removal'                 => $this->input->post('follow_up_2_stent_removal'),
						'smooth'                        => $this->input->post('follow_up_2_smooth'),
						'adverse_event'                 => $this->input->post('follow_up_2_adverse_event'),
						'office_based'                  => $this->input->post('follow_up_2_office_based'),
						'day_care'                      => $this->input->post('follow_up_2_day_care'),
						'la'                            => $this->input->post('follow_up_2_la'),
						'ga'                            => $this->input->post('follow_up_2_ga'),
						'flexible_cystoscope'           => $this->input->post('follow_up_2_flexible_cystoscope'),
						'rigid_cystoscope'              => $this->input->post('follow_up_2_rigid_cystoscope'),
						'reason'                        => $this->input->post('follow_up_2_reason'),
						'status'                        => 1
					);
		$this->patient_model->updateFollowUpData2($patient_id,$followUpData2);
	}

	public function updateFollowUpData3()
	{
		$patient_id = $this->input->post('patient_id');

		$xray_image = $this->image_file_upload($_FILES['follow_up_3_xray']['name'],$_FILES['follow_up_3_xray']['tmp_name']);
		$us_image   = $this->image_file_upload($_FILES['follow_up_3_us']['name'],$_FILES['follow_up_3_us']['tmp_name']);
		$ct_image   = $this->image_file_upload($_FILES['follow_up_3_ct']['name'],$_FILES['follow_up_3_ct']['tmp_name']);

		$followUpData3 = array(
						'pain'                          => $this->input->post('follow_up_3_pain'),
						'luts'                          => $this->input->post('follow_up_3_luts'),
						'uti'                           => $this->input->post('follow_up_3_uti'),
						'uti_treated'          			=> $this->input->post('f3-uti-treated'),
						'uti_treatment'          		=> $this->input->post('f3-uti-treatment'),
						'hematuria'                     => $this->input->post('follow_up_3_hematuria'),
						'others'                        => $this->input->post('follow_up_3_others'),
						'xray'                          => $xray_image,
						'us'                            => $us_image,
						'ct'                            => $ct_image,
						'f3_residual_fragment'          => $this->input->post('f3_residual_fragment'),
						'f3_residual_fragment_size'     => $this->input->post('f3_residual_fragment_size'),
						'f3_residual_fragment_location' => $this->input->post('f3_residual_fragment_location'),
						'f3_residual_fragment_number'   => $this->input->post('f3_residual_fragment_number'),
						'status'                        => 1
					);
		$this->patient_model->updateFollowUpData3($patient_id,$followUpData3);

		$formStatus = $this->patient_model->getFollowUpData3ByPatientID($patient_id);
		if($formStatus->status == 1){
			$user_id            = $this->session->userdata('user_id');
			$patientData        = $this->patient_model->getPatientDataByPatientID($formStatus->patient_id);
			$userData           = $this->dashboard_model->getUserByUserId($user_id);
			
			$patientReference   = $patientData[0]->patient_reference;
			$patientCode        = $patientData[0]->code;
			$username           = $userData[0]->first_name.$userData[0]->last_name;
			$user_code          = $userData[0]->user_code;
			
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			
			$this->email->initialize($config);
			
			$this->email->from('CDM');
			$this->email->to('yasserafarhat@yahoo.com');
			$this->email->subject('New Patient created successfuly');
			
			$message            = 'New patient has been created successfuly by Dr. '.$username.' with user code '.$user_code.'<br/>';
			$message            .= 'Patient Reference : '.$patientReference.'<br/>';
			$message            .= 'Patient Code : '.$patientCode;
			$this->email->message($message);
			
			$this->email->send();
		}
	}
}

?>