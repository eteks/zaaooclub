<?php
class Catalog extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function get_categories()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_category');
		$this->db->order_by('category_createddate','desc');	
		$query = $this->db->get();
		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_category($data)
	{	
		// Query to insert data in database
		$this->db->insert('giftstore_category', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}	
	public function update_category($data)
	{	
		$this->db->where('category_id', $data['category_id']);
		$this->db->update('giftstore_category', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
	public function get_category_data($id)
	{	
		$query = $this->db->get_where('giftstore_category', array('category_id' => $id));
		return $query->row_array();
	}
	public function get_subcategories()
	{	
		//get list of subcategories from database using mysql query 
		// $query = $this->db->query("SELECT * FROM giftstore_subcategory order 
		// 	by subcategory_createddate desc");	

		$this->db->select('sub.*,cat.category_name');
		$this->db->from('giftstore_subcategory AS sub');
		$this->db->join('giftstore_subcategory_category AS subcat', 'subcat.subcategory_mapping_id = sub.subcategory_id', 'inner');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = subcat.category_mapping_id', 'inner');
		// $this->db->group_by('subcategory_id');
		$this->db->order_by('subcategory_createddate','desc');
		
		$query = $this->db->get();
		// echo "<pre>";
		// print_r(array_merge_recursive($query->result_array()));
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_subcategory($data,$category_data)
	{	
		// Query to insert data in database
		$this->db->insert('giftstore_subcategory', $data);
		//get inserted subcategory id to map in subcategory category relationship table
		$subcategory_id = $this->db->insert_id();
		foreach($category_data as $key => $value) {
			$subcategory_category_map = array(
                					'subcategory_mapping_id' => $subcategory_id,
                					'category_mapping_id' => $value,
             						);
			$this->db->insert('giftstore_subcategory_category', $subcategory_category_map);
		}
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}	
	public function update_subcategory($data)
	{	
		$category = $data['post_category'];
		$subcategory_data = $data['post_subcategory'];
		if(!empty($category['removed_category_data'])){
			$condition = "subcategory_mapping_id =". $subcategory_data['subcategory_id'] ." AND category_mapping_id IN(".$category['removed_category_data'].")";
			$this->db->from('giftstore_subcategory_category');
			$this->db->where($condition);
			$this->db->delete();
			// trans_complete() function is used to check whether updated query successfully run or not
			if ($this->db->trans_complete() == false) {
				return false;
			}
		}
		foreach($category['category_data'] as $value) {
			$subcategory_category_map_data = array(
				'subcategory_mapping_id' => $subcategory_data['subcategory_id'],
				'category_mapping_id' => $value,
			);
			$this->db->select('*');
			$this->db->from('giftstore_subcategory_category');
			$this->db->where($subcategory_category_map_data);
			$query = $this->db->get();
			if($query->num_rows() == 0)
				$this->db->insert('giftstore_subcategory_category', $subcategory_category_map_data);
		}
		$this->db->where('subcategory_id', $subcategory_data['subcategory_id']);
		$this->db->update('giftstore_subcategory', $subcategory_data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
	public function get_subcategory_data($id)
	{	
		$query['subcategory_data'] = $this->db->get_where('giftstore_subcategory', array('subcategory_id' => $id))->row_array();
		// $query['subcategory_category'] = $this->db->get_where('giftstore_subcategory_category', array('subcategory_mapping_id' => $id))->result_array();
		$this->db->select('category_mapping_id');
		$this->db->from('giftstore_subcategory_category');
		$this->db->where('subcategory_mapping_id',$id);
		$get_data = $this->db->get()->result();
		$query['subcategory_category'] = array();
		foreach($get_data as $row){
            array_push($query['subcategory_category'],$row->category_mapping_id);
        }
		return $query;
	}
	public function get_recipient()
	{	
		//get list of subcategories from database using mysql query 	
		$this->db->select('rec.*,cat.category_name');
		$this->db->from('giftstore_recipient AS rec');
		$this->db->join('giftstore_recipient_category AS reccat', 'reccat.recipient_mapping_id = rec.recipient_id', 'left');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = reccat.category_mapping_id', 'left');
		// $this->db->group_by('subcategory_id');
		$this->db->order_by('recipient_createddate','desc');
		
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_recipient($data,$category_data)
	{	
		// Query to insert data in database
		$this->db->insert('giftstore_recipient', $data);
		//get inserted recipient id to map in recipient category relationship table
		$recipient_id = $this->db->insert_id();
		foreach($category_data as $key => $value) {
			$recipient_category_map = array(
                					'recipient_mapping_id' => $recipient_id,
                					'category_mapping_id' => $value,
             						);
			$this->db->insert('giftstore_recipient_category', $recipient_category_map);
		}
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}
	public function get_recipient_data($id)
	{	
		$query['recipient_data'] = $this->db->get_where('giftstore_recipient', array('recipient_id' => $id))->row_array();
		// $query['subcategory_category'] = $this->db->get_where('giftstore_subcategory_category', array('subcategory_mapping_id' => $id))->result_array();
		$this->db->select('category_mapping_id');
		$this->db->from('giftstore_recipient_category');
		$this->db->where('recipient_mapping_id',$id);
		$get_data = $this->db->get()->result();
		$query['recipient_category'] = array();
		foreach($get_data as $row){
            array_push($query['recipient_category'],$row->category_mapping_id);
        }
		return $query;
	}	
	public function update_recipient($data)
	{	
		$category = $data['post_category'];
		$recipient_data = $data['post_recipient'];
		if(!empty($category['removed_category_data'])){
			$condition = "recipient_mapping_id =". $recipient_data['recipient_id'] ." AND category_mapping_id IN(".$category['removed_category_data'].")";
			$this->db->from('giftstore_recipient_category');
			$this->db->where($condition);
			$this->db->delete();
			// trans_complete() function is used to check whether updated query successfully run or not
			if ($this->db->trans_complete() == false) {
				return false;
			}
		}
		foreach($category['category_data'] as $value) {
			$recipient_category_map_data = array(
				'recipient_mapping_id' => $recipient_data['recipient_id'],
				'category_mapping_id' => $value,
			);
			$this->db->select('*');
			$this->db->from('giftstore_recipient_category');
			$this->db->where($recipient_category_map_data);
			$query = $this->db->get();
			if($query->num_rows() == 0)
				$this->db->insert('giftstore_recipient_category', $recipient_category_map_data);
		}
		$this->db->where('recipient_id', $recipient_data['recipient_id']);
		$this->db->update('giftstore_recipient', $recipient_data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}
	public function get_product_attributes()
	{	
		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_product_attribute order 
			by product_attribute_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_product_attributes($data)
	{	
		// print_r($data);
		// Query to check whether category name already exist or not
		$condition = "product_attribute =" . "'" . $data['product_attribute'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_product_attribute');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_product_attribute', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_product_attribute($data)
	{	
		// print_r($data);
		$condition = "product_attribute =" . "'" . $data['product_attribute'] . "' AND product_attribute_id NOT IN (". $data['product_attribute_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_product_attribute');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('product_attribute_id', $data['product_attribute_id']);
			$this->db->update('giftstore_product_attribute', $data);
			return true;
		}	
	}
	public function get_product_attribute_data($id)
	{	
		$query = $this->db->get_where('giftstore_product_attribute', array('product_attribute_id' => $id));
		return $query->row_array();
	}
	public function get_products()
	{	
		//get list of products from database using mysql query 
		// $query = $this->db->query("SELECT * FROM giftstore_product order 
		// 	by product_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		$this->db->select('pro.*,cat.category_name,subcat.subcategory_name,rec.recipient_type');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = pro.product_category_id', 'Left');
		$this->db->join('giftstore_subcategory AS subcat', 'subcat.subcategory_id = pro.product_subcategory_id', 'Left');
		$this->db->join('giftstore_recipient AS rec', 'rec.recipient_id = pro.product_recipient_id', 'Left');
		$this->db->order_by('product_createddate','desc');
		$query['product_result'] = $this->db->get()->result_array();

		$this->db->select('*');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_product_upload_image AS img', 'img.product_mapping_id = pro.product_id', 'inner');
		$this->db->order_by('product_createddate','desc');
		$query['product_image'] = $this->db->get()->result_array();

		//return all records in array format to the controller
		return $query;
	}
	public function get_category_reference($id)
	{	
		$condition = "subcat.category_mapping_id =".$id;
		$this->db->select('sub.subcategory_id,sub.subcategory_name');
		$this->db->from('giftstore_subcategory AS sub');
		$this->db->join('giftstore_subcategory_category AS subcat', 'subcat.subcategory_mapping_id = sub.subcategory_id', 'left');
		$this->db->where($condition);
		$this->db->order_by('subcategory_name','asc');
		$this->db->group_by('subcategory_name');
		$query['subcategory_category'] = $this->db->get()->result_array();

		// $query = $this->db->get()->result_array();

		$condition = "reccat.category_mapping_id =".$id;
		$this->db->select('rec.recipient_id,rec.recipient_type');
		$this->db->from('giftstore_recipient AS rec');
		$this->db->join('giftstore_recipient_category AS reccat', 'reccat.recipient_mapping_id = rec.recipient_id', 'left');
		$this->db->where($condition);
		$this->db->order_by('recipient_type','asc');
		$this->db->group_by('recipient_type');
		$query['recipient_category'] = $this->db->get()->result_array();

		//return all records in array format to the controller
		return $query;
	}
	public function insert_product($data)
	{	
		$data_product_basic = $data['product_basic'];
		$data_product_files = $data['product_files'];
		$data_product_attributes = isset($data['product_attributes'])?$data['product_attributes']:"";
		// Query to check whether category name already exist or not
		$condition = "product_title =" . "'" . $data_product_basic['product_title'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_product');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if(empty($data_product_basic['product_recipient_id']))
			$data_product_basic['product_recipient_id'] = NULL;
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_product', $data_product_basic);
			//get inserted subcategory id to map in subcategory category relationship table
			$product_id = $this->db->insert_id();
			foreach($data_product_files as $key => $value) {
				$product_image_map = array(
	                					'product_mapping_id' => $product_id,
	                					'product_upload_image' => $value,
	             						);
				$this->db->insert('giftstore_product_upload_image', $product_image_map);
			}
			// echo "<pre>";
			// print_r($data_product_attributes);
			// echo "</pre>";
			if(!empty($data_product_attributes)){
				foreach($data_product_attributes as $key=>$value){
					$attributes = $data_product_attributes[$key][0];
					$price = $data_product_attributes[$key][1];
					$items = $data_product_attributes[$key][2];
					$product_attribute_inserted_id = array();
					foreach ($attributes as $key => $value) {
						$product_attribute_id = $attributes[$key][0];
						$product_attribute_value = $attributes[$key][1];
						$product_attributes_data = array(
							'product_attribute_id' => $product_attribute_id ,
							'product_attribute_value' => $product_attribute_value 
						);
						$this->db->insert('giftstore_product_attribute_value', $product_attributes_data);
						array_push($product_attribute_inserted_id,$this->db->insert_id());
					}
					$product_attributes_group = array(
							'product_mapping_id' => $product_id ,
							'product_attribute_group_price' => $price ,
							'product_attribute_group_totalitems' => $items,
							'product_attribute_value_combination_id' => implode(",", $product_attribute_inserted_id)
					);
					$this->db->insert('giftstore_product_attribute_group', $product_attributes_group);
				}
			}	
			if($this->input->post('selectall_status') != 0){
				// $json_data = array();
				// json_encode all params values that are not strings
				$applicable_city = $this->input->post('applicable_city');
			    foreach ($applicable_city as $value) {
			    	$city_datas = array(
			    		'product_mapped_id' => $product_id,
			    		'city_mapped_id' => $value
			    	);
			    	// array_push($json_data, $city_datas);
			    	$this->db->insert('giftstore_product_city', $city_datas);	        
			    }
			    // print_r(json_encode($json_data));
				// $string = file_get_contents("product_city.json");
			}	
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function get_product_attribute_sets(){
		$query = $this->db->query("SELECT *
				FROM `giftstore_product_attribute_value` AS c
				INNER JOIN 
				(
				    SELECT product_mapping_id,product_attribute_group_id,product_attribute_group_price,	product_attribute_group_totalitems,product_attribute_group_sold, SUBSTRING_INDEX( SUBSTRING_INDEX( t.product_attribute_value_combination_id, ',', n.n ) , ',', -1 ) value
					FROM giftstore_product_attribute_group t
					CROSS JOIN numbers n
					WHERE n.n <=1 + ( LENGTH( t.product_attribute_value_combination_id ) - LENGTH( REPLACE( t.product_attribute_value_combination_id, ',', '' ) ) )
				)AS a ON a.value = c.product_attribute_value_id
				INNER JOIN 
				(
				    SELECT product_attribute_id,product_attribute
					FROM giftstore_product_attribute
				)AS pa ON pa.product_attribute_id = c.product_attribute_id
				INNER JOIN
				(
					SELECT product_id,product_title from giftstore_product
				) AS p ON p.product_id = a.product_mapping_id");
		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function delete_data($tablename,$fieldname,$id){
		$condition = $fieldname. " =". $id;
		$this->db->from($tablename);
		$this->db->where($condition);
		$this->db->delete();
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}
	public function check_product_is_unique($product_title,$id){
		if(!empty($id))
			$condition = "product_title =" . "'" . $product_title . "'AND product_id NOT IN (". $id.")";
		else
			$condition = "product_title =" . "'" . $product_title . "'";
		$this->db->select('product_title');
		$this->db->from('giftstore_product');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return false;
		}
		return true;
	}
	public function get_giftproduct_data($id)
	{	
		//Get Product default field data
		$this->db->select('*');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = pro.product_category_id', 'inner');
		$this->db->join('giftstore_subcategory AS subcat', 'subcat.subcategory_id = pro.product_subcategory_id', 'inner');
		$this->db->where('product_id', $id);
		$query['product_list'] = $this->db->get()->row_array();
		// echo $this->db->last_query();

		$this->db->select('img.*');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_product_upload_image AS img', 'img.product_mapping_id = pro.product_id', 'inner');
		$this->db->where('product_id', $id);
		$this->db->order_by('product_createddate','desc');
		$query['product_image'] = $this->db->get()->result_array();

		$category_id = $query['product_list']['product_category_id'];
		$category_reference = $this->get_category_reference($category_id);
		$query['subcategory_list'] = $category_reference['subcategory_category'];
		$query['recipient_list'] = $category_reference['recipient_category'];

		//Get Product Attribute Data

		// $this->db->select('*');
		// $this->db->from('giftstore_product_attribute_group AS progroup');
		// $this->db->where('product_mapping_id', $id);
		// $query['product_attribute_list'] = $this->db->get()->result_array();

		$query['product_attribute_list'] = $this->db->query("SELECT * FROM giftstore_product_attribute_value AS c INNER JOIN ( SELECT product_attribute_group_id,product_attribute_group_price,	product_mapping_id,product_attribute_group_totalitems, SUBSTRING_INDEX( SUBSTRING_INDEX( t.product_attribute_value_combination_id, ',', n.n ) , ',', -1 ) value FROM giftstore_product_attribute_group t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.product_attribute_value_combination_id ) - LENGTH( REPLACE( t.product_attribute_value_combination_id, ',', ''))) AND t.product_mapping_id=$id) AS a ON a.value = c.product_attribute_value_id INNER JOIN giftstore_product_attribute AS pa ON c.product_attribute_id=pa.product_attribute_id")->result_array();
		return $query;
	}
	public function update_product($data)
	{	
		$data_product_basic = $data['product_basic'];
		$data_product_files = $data['product_files'];
		// echo "<pre>";
		// print_r($data_product_files);
		// echo "</pre>";
		$data_product_attributes_exists = isset($data['product_attributes_exists'])?$data['product_attributes_exists']:"";
		// echo "<pre>";
		// print_r($data_product_attributes_exists);
		// echo "</pre>";
		if(empty($data_product_basic['product_recipient_id']))
			$data_product_basic['product_recipient_id'] = NULL;
		$data_product_attributes_new = isset($data['product_attributes_new'])?$data['product_attributes_new']:"";
		$this->db->where('product_id', $data_product_basic['product_id']);
		$this->db->update('giftstore_product', $data_product_basic);

		// To insert newly added images while update product
		$product_id = $data_product_basic['product_id'];
		foreach($data_product_files as $key => $value) {
			$product_image_map = array(
                					'product_mapping_id' => $product_id,
                					'product_upload_image' => $value,
             						);
			$this->db->insert('giftstore_product_upload_image', $product_image_map);
		}
		//Code to remove image
		if(!empty($data['removed_product'])){
			// To remove image from folder
			$condition = "product_upload_image_id IN(".$data['removed_product'].")";
			$this->db->select('product_upload_image');
			$this->db->from('giftstore_product_upload_image');
			$this->db->where($condition);
			$removedimage = $this->db->get()->result_array();
			foreach ($removedimage as $key => $value) {
				unlink(FCPATH.$value['product_upload_image']);
			}
			// To remove the photos which is removed while update product
			$condition = "product_upload_image_id IN(".$data['removed_product'].")";
			$this->db->from('giftstore_product_upload_image');
			$this->db->where($condition);
			$this->db->delete();				
		}
		// To update and remove existing attributes
		if(!empty($data_product_attributes_exists)){
			foreach($data_product_attributes_exists as $key=>$value){
				$product_attribute_group_id = $value[0];
				$attributes = $value[1][0];
				$price = $value[1][1];
				$items = $value[1][2];
				$product_attribute_inserted_id = array();
				foreach ($attributes as $key => $value1) {
					$product_attribute_id = $value1[0];
					$product_attribute_value = $value1[1];
					$product_attributes_data = array(
							'product_attribute_id' => $product_attribute_id ,
							'product_attribute_value' => $product_attribute_value 
					);
					// echo "<pre>";
					// print_r($product_attributes_data);
					// echo "</pre>";
					$this->db->select('*');
					$this->db->from('giftstore_product_attribute_value');
					$this->db->where($product_attributes_data);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$query = $query->row_array();
						$map_id = $query['product_attribute_value_id'];
					}
					else{
						$this->db->insert('giftstore_product_attribute_value', $product_attributes_data);
						$map_id = $this->db->insert_id();
					}
					array_push($product_attribute_inserted_id,$map_id);
				}
				if(sizeof($product_attribute_inserted_id) > 0)
					$product_attribute_inserted_id = implode(",", $product_attribute_inserted_id);
				$product_attributes_group = array(
						'product_mapping_id' => $data_product_basic['product_id'] ,
						'product_attribute_group_price' => $price ,
						'product_attribute_group_totalitems' => $items,
						'product_attribute_value_combination_id' => $product_attribute_inserted_id	
				);
				$this->db->select('*');
				$this->db->from('giftstore_product_attribute_group');
				$this->db->where('product_attribute_group_id', $product_attribute_group_id);
				$query1 = $this->db->get();
				if($query1->num_rows() > 0){
					$this->db->where('product_attribute_group_id', $product_attribute_group_id);
					$this->db->update('giftstore_product_attribute_group', $product_attributes_group);
				}
				else{
					$this->db->insert('giftstore_product_attribute_group', $product_attributes_group);
				}
			}
		}		
		// To store the attributes newly
		if(!empty($data_product_attributes_new)){
			foreach($data_product_attributes_new as $key=>$value){
				$attributes = $value[0];
				$price = $value[1];
				$items = $value[2];
				$product_attribute_inserted_id = array();
				foreach ($attributes as $key => $value) {
					$product_attribute_id = $attributes[$key][0];
					$product_attribute_value = $attributes[$key][1];
					$product_attributes_data = array(
						'product_attribute_id' => $product_attribute_id ,
						'product_attribute_value' => $product_attribute_value 
					);
					$this->db->insert('giftstore_product_attribute_value', $product_attributes_data);
					array_push($product_attribute_inserted_id,$this->db->insert_id());
				}
				$product_attributes_group = array(
						'product_mapping_id' => $data_product_basic['product_id'] ,
						'product_attribute_group_price' => $price ,
						'product_attribute_group_totalitems' => $items,
						'product_attribute_value_combination_id' => implode(",", $product_attribute_inserted_id)
				);
				$this->db->insert('giftstore_product_attribute_group', $product_attributes_group);
			}
		}	
		$condition = "product_mapped_id =". $data_product_basic['product_id']; 
		$this->db->from('giftstore_product_city');
		$this->db->where($condition);
		$this->db->delete();
		if($this->input->post('selectall_status') != 0){
			// json_encode all params values that are not strings
			$applicable_city = $this->input->post('applicable_city');
			if(!empty($applicable_city)){
			    foreach ($applicable_city as $value) {
			    	$city_datas = array(
			    		'product_mapped_id' => $data_product_basic['product_id'],
			    		'city_mapped_id' => $value
			    	);
			    	// array_push($json_data, $city_datas);
			    	$this->db->insert('giftstore_product_city', $city_datas);	        
			    }
			}
		}	
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
	public function get_cities()
	{	
		//get list of cities from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_city');
		$this->db->order_by('city_createddate','desc');	
		$query = $this->db->get();
		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_product_cities($id)
	{	
		//get list of cities for the product from database using mysql query 
		$condition = "product_mapped_id =". $id; 
		$this->db->select('city_mapped_id');
		$this->db->from('giftstore_product_city');
		$this->db->order_by('created_date','desc');	
		$this->db->where($condition);
		$query = $this->db->get()->result_array();
		$newarray = array();
		foreach ($query as $value) {
		    $newarray[] = $value['city_mapped_id'];
		}
		//return all records in array format to the controller
		return $newarray;
	}
}