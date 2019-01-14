<?php
class Location extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}	
	public function get_order()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_order');
		$this->db->order_by('order_createddate','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
		public function get_transaction()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_ccavenue_transaction');
		$this->db->order_by('transaction_createddate','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
		public function update_order($data)
	{	
		$this->db->where('order_id', $data['order_id']);
		$this->db->update('giftstore_order', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->get() == false) {
			return false;
		}
		return true;	
	}	
}