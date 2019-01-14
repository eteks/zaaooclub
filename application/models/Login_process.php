<?php
class Login_process extends CI_Model
{
	// Public function check($data)
	// {
	// 	//$this->load->library('session');
	// 	$this->load->database();
	// 	$query=$this->db->get_where('saai_users', array('unique_id' => $data['username'],'user_password' => $data['password'],'user_status'=>0, 'otp'=>$data['otp']));
	// 	//echo $query->num_rows();
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
	Public function check($data)
	{
		//$this->load->library('session');
		$this->load->database();
		$result_data=$this->db->get_where('saai_users', array('unique_id' => $data['username'],'user_password' => $data['password']),1)->row_array();
		// print_r($result_data);
		// echo $result_data['user_status'];
		if($result_data['user_status'] == 0){
			// echo "OTP must";
			if($result_data['otp'] == $data['otp']){
				// echo "otp matched";
				$update_condition = '(user_id="'.$result_data['user_id'].'")'; 
	            $this->db->set(array('user_status' => 1));
	            $this->db->where($update_condition);
	            $this->db->update("saai_users");
	            // echo $this->db->last_query();
				return $result_data;
			}
			else
				return false;
		}
		else if($result_data['user_status'] == 1){
			return $result_data;
		}
		else{
			return false;
		}

		// echo $query->num_rows();
		// if($query->num_rows() > 0)
		// {
		// 	return $query->result();
		// }
		// else
		// {
		// 	return false;
		// }
	}
}