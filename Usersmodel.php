<?php
class Usersmodel extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}



	public function add_end_users($fields)
	{	
		//echo $fields['user_reg_by'];
		$this->db->insert('saai_end_users', $fields);
		
		if ($this->db->affected_rows() > 0) 
		{


			$this->db->set('users_count', 'users_count+1', FALSE);
			$this->db->where('user_id', $fields['user_reg_by']);
			if($this->db->update('saai_users'))
			{
				return true;
			}

			
		}
	}
}