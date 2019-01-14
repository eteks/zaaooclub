<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/usersmodel');
		// Load form helper library
		$this->load->helper('url');
		 $this->load->library('email');     
		// Load form validation library
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function adminusers()
	{	
		//get list of admin users from database and store it in array variable 'adminusers' with key 'adminusers_list'
		$adminusers['adminusers_list'] = $this->usersmodel->get_adminusers();
		
		//call the adminusers views i.e rendered page and pass the adminusers data in the array variable 'adminusers'
		$this->load->view('admin/adminusers',$adminusers);
	}

	public function add_adminusers()
	{	
		$this->load->view('admin/add_adminusers');
	}

	public function ajax_user()
	{
		$data = $this->usersmodel->get_ajax_user_data();
		echo json_encode($data);
	}

	public function edit_adminusers()
	{	
		// $user_details = edit_unique();
		// echo $user_details;

		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST))
		{
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'adminuser_username',
		             'label'   => 'Username',
		             'rules'   => 'trim|required|min_length[3]|max_length[25]|is_unique[saai_adminusers.adminuser_id.adminuser_username.'.$id.']'
		          ),
		       array(
		             'field'   => 'adminuser_password',
		             'label'   => 'Password',
		             'rules'   => 'trim|required'
		          ), 
		       array(
		             'field'   => 'adminuser_email',
		             'label'   => 'Email',
		             'rules'   => 'trim|required|valid_email|is_unique[saai_adminusers.adminuser_id.adminuser_email.'.$id.']'
		          ),
		       array(
		             'field'   => 'adminuser_mobile',
		             'label'   => 'Mobile',
		             'rules'   => 'trim|required|min_length[10]|max_length[10]'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if($this->form_validation->run() == FALSE) 
		    {
		    	foreach($validation_rules as $row)
		    	{
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else
    		{
				$data = array(
				'adminuser_id' => $id,
				'adminuser_username' => $this->input->post('adminuser_username'),
				'adminuser_password' => $this->input->post('adminuser_password'),
				'adminuser_email' => $this->input->post('adminuser_email'),
				'adminuser_mobile' => $this->input->post('adminuser_mobile'),
				);
				// print_r($data);
				$result = $this->usersmodel->update_adminusers($data);
				if($result == 'true')
					$status['error_message'] = "User Updated Successfully!";
				else
					$status['error_message'] = "Something Went Wrong!";	
    		}
		}
		$status['adminuser_data'] = $this->usersmodel->get_adminusers_data($id);
		$this->load->view('admin/edit_adminusers',$status);
	}

	public function primary_users()
	{
		//get list of end users from database and store it in array variable 'adminusers' with key 'adminusers_list'
		$endusers['endusers_list'] = $this->usersmodel->get_primary_user();
		//$endusers['endusers_list'] = $this->usersmodel->get_primary_user();
		// $endusers['endusers_list'] = $this->usersmodel->get_endusers();
		// $endusers['state_list'] = $this->usersmodel->get_state();
		// $endusers['city_list'] = $this->usersmodel->get_state();
		
		//call the endusers views i.e rendered page and pass the adminusers data in the array variable 'adminusers'
		$this->load->view('admin/primary_users',$endusers);	
	}
	public function end_users()
	{
		
		$endusers['endusers_list'] = $this->usersmodel->get_end_user();
		
		$this->load->view('admin/end_users',$endusers);	
	}

	public function add_primary_users()
	{
		$status = array();
		if(!empty($_POST))
		{
			// print_r($_POST);
			//array is initialized
			function random_password() 
			{
			    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			    $password = array(); 
			    $alpha_length = strlen($alphabet) - 1; 
			    for ($i = 0; $i < 8; $i++) 
			    {
			        $n = rand(0, $alpha_length);
			        $password[] = $alphabet[$n];
			    }
			    return implode($password); 
			}

			$errors = '';
			
			$validation_rules = array(

		     
		       
		     
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) 
		    {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else
    		{
				$data = array(
				'user_reg_by' => "admin",
				'first_name' => $this->input->post('first_name'),
				'user_mobile' => $this->input->post('user_mobile'),
				'user_email' => $this->input->post('user_email'),
				'user_password' => random_password(),				
				'user_dob' => $this->input->post('user_dob'),
				'user_package' => $this->input->post('user_package'),
				'user_status' => 1,
				'user_createddate' => date('Y-m-d'),
				);

				$result = $this->usersmodel->add_primary_users($data);
				//exit();	
				if($result)
				{

					 $data['result']=$result;
					  $message = $this->load->view('admin/register_confirmation',$data,TRUE);     
        
                         
						$this->config->load('email', true);
						$emailsetup = $this->config->item('email');
						$this->load->library('email', $emailsetup);
						$to_email = $data['user_email'];
						$subject = 'Registration';
						$this->email->initialize($emailsetup); 
						$this->email->from($emailsetup['username'], 'Saai Holidays');
						$this->email->to($to_email);
						$this->email->subject($subject);
						$this->email->message($message);

						if($this->email->send())
						{
							$this->load->view('pages/sendsms');
							$sendsms = new Sendsms("http://alerts.maxwellsms.com/api", "A5e24450f7e3297df048b257204e76d89", "SaaiRG");
							$text="Successfully registered with Saai Holidays.Please use the login details username:".$result." Password:".$data['user_password'];
							$sendsms->send_sms($data['user_mobile'], $text,'json');
							$this->form_validation->clear_field_data();
							$status['error_message'] = "Leader Added Successfully!";							
						}

				}
				else
				{
					$status['error_message'] = "Can not Add User Below";	
				}
    		}
		}

		$this->load->view('admin/add_primary_users',$status);	
	}

	public function edit_primary_users()
	{
		$id = $this->uri->segment(4);
		
		if(!empty($_POST))
		{
			$status = array();
			$errors = '';
			
			$validation_rules = array(

		      array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|min_length[3]|max_length[25]'
                  ),
              array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|min_length[3]|max_length[25]'
                  ),
                array(
                     'field'   => 'user_dob',
                     'label'   => 'Date Of Birth',
                     'rules'   => 'trim|required'
                  ),

              array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required'
                  ),
             array(
                     'field'   => 'user_mobile',
                     'label'   => 'Mobile',
                     'rules'   => 'trim|required|min_length[10]|max_length[10]|is_unique[saai_users.user_mobile]'
                  ), 
                array(
                     'field'   => 'user_email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email|is_unique[saai_users.user_email]'
                  ), 
                           
          array(
                     'field'   => 'address_line1',
                     'label'   => 'Address Line 1',
                     'rules'   => 'trim|required'
                  ),
          array(
                     'field'   => 'address_line2',
                     'label'   => 'Address Line 2',
                     'rules'   => 'trim|required'
                  ),
          array(
                     'field'   => 'city',
                     'label'   => 'City',
                     'rules'   => 'trim|required'
                  ),
          array(
                     'field'   => 'state',
                     'label'   => 'State',
                     'rules'   => 'trim|required'
                  ),
          array(
                     'field'   => 'id_proof',
                     'label'   => 'ID Proof',
                     'rules'   => 'trim|required'
                  ),
          array(
                     'field'   => 'aadhar_number',
                     'label'   => 'Aadhar Card Number',
                     'rules'   => 'trim|required|min_length[12]|max_length[12]|is_unique[saai_users.aadhar_number]'
                  ),
              array(
                     'field'   => 'package',
                     'label'   => 'Package',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'mode_of_transport',
                     'label'   => 'Mode of Transport',
                     'rules'   => 'trim|required'
                  ),
                    array(
                     'field'   => 'image',
                     'label'   => 'Upload ID Copy',
                     'rules'   => 'trim1|required'
                     //image
                  ),
                          array(
                     'field'   => 'payment',
                     'label'   => 'Payment',
                     'rules'   => 'trim1|required'
                     //image
                  ),
		     
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) 
		    {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else
    		{
				$data = array(
				'user_id' => $id,
				'first_name' => $this->input->post('first_name'),
				'user_mobile' => $this->input->post('user_mobile'),
				'user_email' => $this->input->post('user_email'),			
				'user_dob' => $this->input->post('user_dob'),
				'user_package' => $this->input->post('user_package'),
				);

				$result = $this->usersmodel->update_primary_users($data);
				if($result)
				{	   
							
					$status['error_message'] = "Primary User Updated Successfully!";
				}
				else
				{
					$status['error_message'] = "Something Went Wrong!";	
				}

    		}
		}
		$status['enduser_data']	= $this->usersmodel->get_primary_users_data($id);
		//print_r($status['enduser_data']);
		$this->load->view('admin/edit_primary_users',$status);	
	}

	public function edit_end_users()
	{
		$id = $this->uri->segment(4);
		
		if(!empty($_POST))
		{
			$status = array();
			$errors = '';
			
			$validation_rules = array(

		      array(
		             'field'   => 'first_name',
		             'label'   => 'First Name',
		             'rules'   => 'trim|required|min_length[5]|max_length[10]'
		          ),
		      array(
		             'field'   => 'user_mobile',
		             'label'   => 'Mobile',
		             'rules'   => 'trim|required|min_length[10]|max_length[10]'
		          ), 
				array(
				     'field'   => 'user_email',
				     'label'   => 'Email',
				     'rules'   => 'trim|required|valid_email'
				  ), 
		       
	          array(
		             'field'   => 'user_dob',
		             'label'   => 'Date Of Birth',
		             'rules'   => 'trim|required'
		          ),
	   
	          array(
		             'field'   => 'user_package',
		             'label'   => 'Package',
		             'rules'   => 'trim|required'
		          ),
		       
		     
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) 
		    {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else
    		{
				$data = array(
				'user_id' => $id,
				'first_name' => $this->input->post('first_name'),
				'user_mobile' => $this->input->post('user_mobile'),
				'user_email' => $this->input->post('user_email'),			
				'user_dob' => $this->input->post('user_dob'),
				'user_package' => $this->input->post('user_package'),
				);

				$result = $this->usersmodel->update_end_users($data);
				if($result)
				{	   
							
							$status['error_message'] = "End User Updated Successfully!";
				}
				else
				{
					$status['error_message'] = "Something Went Wrong!";	
				}

    		}
		}
		$status['enduser_data']	= $this->usersmodel->get_end_users_data($id);
		//print_r($status['enduser_data']);
		$this->load->view('admin/edit_end_users',$status);	
	}
	
}

