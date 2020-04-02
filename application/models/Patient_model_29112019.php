<?php 
/**
 * 
 */
class Patient_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getPatientDataByUserId($id){
		$this->db->where('user_id',$id);
		$query = $this->db->get('patient_data');

		return $query->result();
	}
}
?>