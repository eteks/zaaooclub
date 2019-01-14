<?php
class Usersmodel extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}

	public function add_end_users($fields)
	{	
	
		$this->db->select('*');
		$this->db->from('saai_users');
		$this->db->where('user_reg_by', $fields['user_reg_by']);
		$count=$this->db->count_all_results();
		
		if($count < 100)
		{	
			$this->db->insert('saai_users', $fields);		
			$insert_id = $this->db->insert_id();
			$unique="oozaaoo_".$insert_id;
			$data=array('unique_id'=>$unique);
			$this->db->where('user_id', $insert_id);
			$this->db->update('saai_users', $data);
			if ($this->db->affected_rows() > 0) 
			{
				return $unique;
			}
		}
		else
		{
			return false;
		}
	}
	public function get_users($user)
	{
		//echo $user;
		$this->db->where('user_reg_by', $user);
		$query = $this->db->get("saai_users");
		//print_r($result);
		return $query->result_array();
	}
}