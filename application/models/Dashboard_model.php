<?php  

/**
 * 
 */
class Dashboard_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getUserByUserId($id){
		$this->db->where('user_id',$id);
		$query = $this->db->get('user_detail');
		return $query->result();
	}
}
?>