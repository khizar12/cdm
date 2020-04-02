<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**

 * 

 */

class Login_model extends CI_Model

{

	

	function __construct()

	{

		parent::__construct();

	}



	function login($username,$password){

		$this->db->where('user_name',$username);

		$this->db->where('password',$password);

		$query = $this->db->get('users');



		return $query->result();

	}



	function get_user_details_by_id($id){

		$this->db->where('user_id',$id);

		$query = $this->db->get('user_detail');



		return $query->result();

	}

}



?>