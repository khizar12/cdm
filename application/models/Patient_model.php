<?php 
/**
 * 
 */
class Patient_model extends CI_Model
{
	
	function __construct() {
		parent::__construct();
		$this->selectQueryFields = '*, pre_operative_data.others AS "pre_operative_others", pre_operative_data.uti AS "pre_operative_uti", pre_operative_data.uti_treated AS "pre_operative_uti_treated", pre_operative_data.uti_treatment AS "pre_operative_uti_treatment", patient_data.id AS "patient_id", pre_operative_data.patient_id AS "pre_operative_patient_id", operative_data.patient_id AS "operative_patient_id",early_post_operative.patient_id AS "early_post_operative_patient_id",follow_up_2.patient_id AS "follow_up_2_patient_id",follow_up_3.patient_id AS "follow_up_3_patient_id", pre_operative_data.uti_treatment AS "pre_operative_data_uti_treatment", operative_data.status AS "operative_data_status",early_post_operative.others AS "early_post_others",early_post_operative.uti AS "early_post_uti",early_post_operative.uti_treated AS "early_post_uti_treated",early_post_operative.uti_treatment AS "early_post_uti_treatment",early_post_operative.status AS "early_post_status",follow_up.others AS "follow_1_others",follow_up.uti AS "follow_1_uti",follow_up.uti_treated AS "follow_1_uti_treated",follow_up.uti_treatment AS "follow_1_uti_treatment",follow_up.xray AS "follow_1_xray",follow_up.us AS "follow_1_us",follow_up.ct AS "follow_1_ct",follow_up.status AS "follow_1_status",follow_up.pain AS "follow_1_pain",follow_up.hematuria AS "follow_1_hematuria",follow_up_2.others AS "follow_2_others",follow_up_2.uti AS "follow_2_uti",follow_up_2.uti_treated AS "follow_2_uti_treated",follow_up_2.uti_treatment AS "follow_2_uti_treatment",follow_up_2.xray AS "follow_2_xray",follow_up_2.us AS "follow_2_us",follow_up_2.ct AS "follow_2_ct",follow_up_2.status AS "follow_2_status",follow_up_2.pain AS "follow_2_pain",follow_up_2.hematuria AS "follow_2_hematuria",follow_up_2.luts AS "follow_2_luts",follow_up_2.stent_removal AS "follow_2_stent_removal",follow_up_2.smooth AS "follow_2_smooth",follow_up_2.adverse_event AS "follow_2_adverse_event",follow_up_2.office_based AS "follow_2_office_based",follow_up_2.day_care AS "follow_2_day_care",follow_up_2.flexible_cystoscope AS "follow_2_flexible_cystoscope",follow_up_2.rigid_cystoscope AS "follow_2_rigid_cystoscope",follow_up_2.reason AS "follow_2_reason",follow_up_3.others AS "follow_3_others",follow_up_3.uti AS "follow_3_uti",follow_up_3.uti_treated AS "follow_3_uti_treated",follow_up_3.uti_treatment AS "follow_3_uti_treatment",follow_up_3.xray AS "follow_3_xray",follow_up_3.us AS "follow_3_us",follow_up_3.ct AS "follow_3_ct",follow_up_3.status AS "follow_3_status",follow_up_3.pain AS "follow_3_pain",follow_up_3.hematuria AS "follow_3_hematuria",follow_up_3.luts AS "follow_3_luts",pre_laboratory_tests.creatinine AS "lab_creatinine", pre_laboratory_tests.creatinine_image AS "lab_creatinine_file", pre_laboratory_tests.urea AS "lab_urea", pre_laboratory_tests.urea_image AS "lab_urea_file", pre_laboratory_tests.calcium AS "lab_calcium", pre_laboratory_tests.calcium_image AS "lab_calcium_file", pre_laboratory_tests.uric_acid AS "lab_uric_acid", pre_laboratory_tests.uric_acid_image AS "lab_uric_acid_file", pre_laboratory_tests.urine_image AS "lab_urine_file"';
	}

	// INDEX PAGE SEARCH AND PAGINATION FUNCTION
	function getRows($params = array()){ 
    	$this->db->select($this->selectQueryFields); 
        $this->db->from('patient_data'); 
	    $this->db->join('pre_operative_data', 'patient_data.id=pre_operative_data.patient_id', 'inner');
	    $this->db->join('operative_data', 'patient_data.id=operative_data.patient_id', 'inner');
	    $this->db->join('early_post_operative', 'patient_data.id=early_post_operative.patient_id', 'inner');
	    $this->db->join('follow_up', 'patient_data.id=follow_up.patient_id', 'inner');
	    $this->db->join('follow_up_2', 'patient_data.id=follow_up_2.patient_id', 'inner');
	    $this->db->join('follow_up_3', 'patient_data.id=follow_up_3.patient_id', 'inner');
	    $this->db->join('pre_laboratory_tests', 'patient_data.id=pre_laboratory_tests.patient_id', 'inner');

	    if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            }
        }
		// Filter data by searched keywords 
        if(array_key_exists("search", $params)){ 
            if(!empty($params['search']['keywords'])){ 
                $this->db->like('code', $params['search']['keywords']); 
            } 
        } 
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('code', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('code', 'ASC'); 
        }

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
      	}else{
      		if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
      			if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
				$query  = $this->db->get(); 
				$result = $query->row_array();
            }else{ 
                $this->db->order_by('code', 'ASC');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params))
                { 
                    $this->db->limit($params['limit'],$params['start']); 
                }
                elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
                { 
                    $this->db->limit($params['limit']); 
                } 

				$query  = $this->db->get(); 
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE; 
            } 
        }

        // Return fetched data 
        return $result;
    }

	function getPatientDataByUserId($id,$user_type) {
		if($user_type == 1){
			$this->db->select('patient_data.id as id , patient_data.group_number as group_number , patient_data.patient_reference as patient_reference , patient_data.code as code , pre_operative_data.status as pre_operative_status , operative_data.status as operative_status , early_post_operative.status as early_post_operative_status , follow_up.status as follow_up_1_status , follow_up_2.status as follow_up_2_status , follow_up_3.status as follow_up_3_status');
		    $this->db->from('patient_data'); 
		    $this->db->join('pre_operative_data', 'patient_data.id=pre_operative_data.patient_id', 'inner');
		    $this->db->join('operative_data', 'patient_data.id=operative_data.patient_id', 'inner');
		    $this->db->join('early_post_operative', 'patient_data.id=early_post_operative.patient_id', 'inner');
		    $this->db->join('follow_up', 'patient_data.id=follow_up.patient_id', 'inner');
		    $this->db->join('follow_up_2', 'patient_data.id=follow_up_2.patient_id', 'inner');
		    $this->db->join('follow_up_3', 'patient_data.id=follow_up_3.patient_id', 'inner');
		    $this->db->order_by('code','DESC'); 

	    	$query = $this->db->get();
		}else{
			$this->db->select('patient_data.id as id , patient_data.group_number as group_number , patient_data.patient_reference as patient_reference , patient_data.code as code , pre_operative_data.status as pre_operative_status , operative_data.status as operative_status , early_post_operative.status as early_post_operative_status , follow_up.status as follow_up_1_status , follow_up_2.status as follow_up_2_status , follow_up_3.status as follow_up_3_status');
		    $this->db->from('patient_data'); 
		    $this->db->join('pre_operative_data', 'patient_data.id=pre_operative_data.patient_id', 'inner');
		    $this->db->join('operative_data', 'patient_data.id=operative_data.patient_id', 'inner');
		    $this->db->join('early_post_operative', 'patient_data.id=early_post_operative.patient_id', 'inner');
		    $this->db->join('follow_up', 'patient_data.id=follow_up.patient_id', 'inner');
		    $this->db->join('follow_up_2', 'patient_data.id=follow_up_2.patient_id', 'inner');
		    $this->db->join('follow_up_3', 'patient_data.id=follow_up_3.patient_id', 'inner');
		    $this->db->where('patient_data.user_id',$id);
		    $this->db->order_by('code','DESC'); 

			$query = $this->db->get();
		}
		return $query->result();
	}

	function getAllPatientDataByUserId($id,$user_type) {
		$selectedData='pre_operative_data.others AS "pre_operative_others", pre_operative_data.uti AS "pre_operative_uti", pre_operative_data.uti_treated AS "pre_operative_uti_treated", pre_operative_data.uti_treatment AS "pre_operative_uti_treatment", patient_data.id AS "patient_id", pre_operative_data.patient_id AS "pre_operative_patient_id", operative_data.patient_id AS "operative_patient_id",early_post_operative.patient_id AS "early_post_operative_patient_id",follow_up_2.patient_id AS "follow_up_2_patient_id",follow_up_3.patient_id AS "follow_up_3_patient_id", pre_operative_data.uti_treatment AS "pre_operative_data_uti_treatment", operative_data.status AS "operative_data_status",early_post_operative.others AS "early_post_others",early_post_operative.uti AS "early_post_uti",early_post_operative.uti_treated AS "early_post_uti_treated",early_post_operative.uti_treatment AS "early_post_uti_treatment",early_post_operative.status AS "early_post_status",follow_up.others AS "follow_1_others",follow_up.uti AS "follow_1_uti",follow_up.uti_treated AS "follow_1_uti_treated",follow_up.uti_treatment AS "follow_1_uti_treatment",follow_up.xray AS "follow_1_xray",follow_up.us AS "follow_1_us",follow_up.ct AS "follow_1_ct",follow_up.status AS "follow_1_status",follow_up.pain AS "follow_1_pain",follow_up.hematuria AS "follow_1_hematuria",follow_up_2.others AS "follow_2_others",follow_up_2.uti AS "follow_2_uti",follow_up_2.uti_treated AS "follow_2_uti_treated",follow_up_2.uti_treatment AS "follow_2_uti_treatment",follow_up_2.xray AS "follow_2_xray",follow_up_2.us AS "follow_2_us",follow_up_2.ct AS "follow_2_ct",follow_up_2.status AS "follow_2_status",follow_up_2.pain AS "follow_2_pain",follow_up_2.hematuria AS "follow_2_hematuria",follow_up_2.luts AS "follow_2_luts",follow_up_2.stent_removal AS "follow_2_stent_removal",follow_up_2.smooth AS "follow_2_smooth",follow_up_2.adverse_event AS "follow_2_adverse_event",follow_up_2.office_based AS "follow_2_office_based",follow_up_2.day_care AS "follow_2_day_care",follow_up_2.flexible_cystoscope AS "follow_2_flexible_cystoscope",follow_up_2.rigid_cystoscope AS "follow_2_rigid_cystoscope",follow_up_2.reason AS "follow_2_reason",follow_up_3.others AS "follow_3_others",follow_up_3.uti AS "follow_3_uti",follow_up_3.uti_treated AS "follow_3_uti_treated",follow_up_3.uti_treatment AS "follow_3_uti_treatment",follow_up_3.xray AS "follow_3_xray",follow_up_3.us AS "follow_3_us",follow_up_3.ct AS "follow_3_ct",follow_up_3.status AS "follow_3_status",follow_up_3.pain AS "follow_3_pain",follow_up_3.hematuria AS "follow_3_hematuria",follow_up_3.luts AS "follow_3_luts",pre_laboratory_tests.creatinine AS "lab_creatinine", pre_laboratory_tests.creatinine_image AS "lab_creatinine_file", pre_laboratory_tests.urea AS "lab_urea", pre_laboratory_tests.urea_image AS "lab_urea_file", pre_laboratory_tests.calcium AS "lab_calcium", pre_laboratory_tests.calcium_image AS "lab_calcium_file", pre_laboratory_tests.uric_acid AS "lab_uric_acid", pre_laboratory_tests.uric_acid_image AS "lab_uric_acid_file", pre_laboratory_tests.urine_image AS "lab_urine_file"';
		if($user_type == 1){
			$query = $this->db->query('SELECT *, '.$selectedData.'
								FROM patient_data INNER JOIN pre_operative_data ON patient_data.id = pre_operative_data.patient_id INNER JOIN operative_data ON patient_data.id = operative_data.patient_id INNER JOIN early_post_operative ON patient_data.id = early_post_operative.patient_id INNER JOIN follow_up ON patient_data.id = follow_up.patient_id INNER JOIN follow_up_2 ON patient_data.id = follow_up_2.patient_id INNER JOIN follow_up_3 ON patient_data.id = follow_up_3.patient_id INNER JOIN pre_laboratory_tests ON patient_data.id = pre_laboratory_tests.patient_id 
								');

	    	return $query->result();
		}else{
			$query = $this->db->query('SELECT *, '.$selectedData.'
								FROM patient_data INNER JOIN pre_operative_data ON patient_data.id = pre_operative_data.patient_id INNER JOIN operative_data ON patient_data.id = operative_data.patient_id INNER JOIN early_post_operative ON patient_data.id = early_post_operative.patient_id INNER JOIN follow_up ON patient_data.id = follow_up.patient_id INNER JOIN follow_up_2 ON patient_data.id = follow_up_2.patient_id INNER JOIN follow_up_3 ON patient_data.id = follow_up_3.patient_id INNER JOIN pre_laboratory_tests ON patient_data.id = pre_laboratory_tests.patient_id
								WHERE patient_data.user_id = '.$id.'
								');

			return $query->result();
		}
	}

	public function deletePatientByPatientId($patient_id) {
		$this->db->delete('early_post_operative', array('patient_id' => $patient_id));
		$this->db->delete('follow_up', array('patient_id' => $patient_id));
		$this->db->delete('follow_up_2', array('patient_id' => $patient_id));
		$this->db->delete('follow_up_3', array('patient_id' => $patient_id));
		$this->db->delete('operative_data', array('patient_id' => $patient_id));
		$this->db->delete('patient_data', array('id' => $patient_id));
		$this->db->delete('pre_laboratory_tests', array('patient_id' => $patient_id));
		$this->db->delete('pre_operative_data', array('patient_id' => $patient_id));
		$this->db->delete('stone', array('patient_id' => $patient_id));
		return TRUE;
	}

	public function getLastGroupNumberByUserID($user_id) {
		$this->db->select("group_number");
		$this->db->where('user_id',$user_id);
		$this->db->from("patient_data");
		$this->db->limit(1);
		$this->db->order_by('id',"DESC");
		$query = $this->db->get();
		return $query->result();
	}

	public function getPatientDataByPatientID($p_id) {
		$this->db->where('id',$p_id);
		$query = $this->db->get('patient_data');
		return $query->result();
	}

	public function getPreOperativeDataByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('pre_operative_data');
		return $query->result();
	}

	public function getOperativeDataByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('operative_data');
		return $query->result();
	}

	public function getEarlyPostOperativeDataByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('early_post_operative');
		return $query->result();
	}

	public function getStoneDataByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('stone');
		return $query->result();
	}
	
	public function getFollowUpDataByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('follow_up');
		return $query->result();
	}

	public function getFollowUpData2ByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('follow_up_2');
		$result = $query->result();
		return @$result[0];
	}

	public function getFollowUpData3ByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('follow_up_3');
		$result = $query->result();
		return @$result[0];
	}

	public function getLaboratoryTestsByPatientID($p_id) {
		$this->db->where('patient_id',$p_id);
		$query = $this->db->get('pre_laboratory_tests');
		$result = $query->result();
		return @$result[0];
	}

	public function updatePatientData($p_id,$data) {
		$this->db->where('id',$p_id);
		$this->db->update('patient_data',$data);
	}

	public function updatePreOperativeData($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('pre_operative_data',$data);
	}
	
	public function updateLaboratoryTestsData($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('pre_laboratory_tests',$data);
	}

	public function updateOperativeData($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('operative_data',$data);
	}

	public function updateEarlyPostOperativeData($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('early_post_operative',$data);
	}

	public function updateStoneData($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('stone',$data);
	}

	public function updateFollowUpData($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('follow_up',$data);
	}

	public function updateFollowUpData2($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('follow_up_2',$data);
	}

	public function updateFollowUpData3($p_id,$data) {
		$this->db->where('patient_id',$p_id);
		$this->db->update('follow_up_3',$data);
	}
}
?>