<?php
class Usersmodel extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_adminusers()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('saai_adminusers');
		$this->db->order_by('adminuser_create_date','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_adminusers_data($id)
	{	
		//get full data of specific admin users by their passing id
		$query = $this->db->get_where('saai_adminusers', array('adminuser_id' => $id));
		//Here row_array() represents to pass only one row of data for their particular user
		return $query->row_array();
	}
	
	// Customize the above code like below because of used some validation function in controller itself
	public function update_adminusers($data)
	{	
		$this->db->where('adminuser_id', $data['adminuser_id']);
		$this->db->update('saai_adminusers', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		//if ($this->db->trans_complete() == false) 
		//{
		//	return false;
		//}
		return true;	
	}
	//Get area data based on state
	public function get_ajax_user_data()
	 {
		// just for sample
		// $query = $this->db->query("SELECT * FROM saai_category WHERE category_status = 1");
		// $query = $this->db->get_where('saai_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM saai_area order by area_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_primary_test_count()
	{	
		//get list of adminusers from database using mysql query 
		$select =array(
		            'saai_users.*',
		           // 'saai_end_users.*',
		            'COUNT(saai_end_users.user_reg_by) AS Count',
		    );

		$this->db->select($select);
		$this->db->from('saai_users');
		$this->db->join('saai_end_users', 'saai_end_users.user_reg_by = saai_users.user_id'); 
		//$this->db->join('userdetails', 'userdetails.user_id = saai_users.user_id');
		$this->db->group_by('saai_users.user_id');
		$query = $this->db->get();  

		echo $this->db->last_query();
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_primary_user()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('saai_users');
		$this->db->where('user_reg_by','admin');
		$this->db->order_by('user_createddate','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_end_user()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('saai_users');
		$this->db->where_not_in('user_reg_by','admin');
		$this->db->order_by('user_createddate','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	
	
	public function get_end_users_data($id)
	{	
		$where = '(user_id="'.$id.'")';
		$query = $this->db->get_where('saai_end_users', $where)->row_array();		
		return $query;
	}

	public function get_primary_users_data($id)
	{	
		$where = '(user_id="'.$id.'")';
		$query = $this->db->get_where('saai_users', $where)->row_array();		
		return $query;
	}

	public function add_primary_users($data)
	{	
		if($data['user_reg_by']=="admin")
		{
			$count="1";
		}
		else
		{
			$this->db->select('*');
			$this->db->from('saai_users');
			$this->db->where('user_reg_by', $data['user_reg_by']);
			$count=$this->db->count_all_results();
		}
		if($count < 2)
		{	
			$this->db->insert('saai_users', $data);		
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

	public function add_endusers($data)
	{	
		
		$this->db->insert('saai_users', $data);
		if ($this->db->affected_rows() > 0) 
		{
			return true;
		}
	}

	public function update_endusers($data)
	{	
		$this->db->where('user_id', $data['user_id']);
		$this->db->update('saai_users', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) 
		{
			return false;
		}
		return true;	
	}	
	public function update_primary_users($data)
	{	
		$this->db->where('user_id', $data['user_id']);
		$result =$this->db->update('saai_users', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		//echo $this->db->last_query();
		//return $result;	
		return true;
	}	

	public function update_end_users($data)
	{	
		$this->db->where('user_id', $data['user_id']);
		$result =$this->db->update('saai_end_users', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		//echo $this->db->last_query();
		//return $result;	
		return true;
	}
		
}