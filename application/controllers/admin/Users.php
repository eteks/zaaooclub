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

	// public function add_primary_users()
	// {
	// 	$status = array();
	// 	if(!empty($_POST))
	// 	{
	// 		// print_r($_POST);
	// 		//array is initialized
	// 		function random_password() 
	// 		{
	// 		    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	// 		    $password = array(); 
	// 		    $alpha_length = strlen($alphabet) - 1; 
	// 		    for ($i = 0; $i < 8; $i++) 
	// 		    {
	// 		        $n = rand(0, $alpha_length);
	// 		        $password[] = $alphabet[$n];
	// 		    }
	// 		    return implode($password); 
	// 		}

	// 		$errors = '';
			
	// 		$validation_rules = array(

	// 	      array(
	// 	             'field'   => 'first_name',
	// 	             'label'   => 'First Name',
	// 	             'rules'   => 'trim|required|min_length[3]|max_length[25]'
	// 	          ),
	// 	      array(
	// 	             'field'   => 'user_mobile',
	// 	             'label'   => 'Mobile',
	// 	             'rules'   => 'trim|required|min_length[10]|max_length[10]'
	// 	          ), 
	// 			array(
	// 			     'field'   => 'user_email',
	// 			     'label'   => 'Email',
	// 			     'rules'   => 'trim|required|valid_email'
	// 			  ), 
		       
	//           array(
	// 	             'field'   => 'user_dob',
	// 	             'label'   => 'Date Of Birth',
	// 	             'rules'   => 'trim|required'
	// 	          ),
	   
	//           array(
	// 	             'field'   => 'user_package',
	// 	             'label'   => 'Package',
	// 	             'rules'   => 'trim|required'
	// 	          ),
		       
		     
	// 	    );
	// 	    $this->form_validation->set_rules($validation_rules);
	// 	    if ($this->form_validation->run() == FALSE) 
	// 	    {
	// 	    	foreach($validation_rules as $row){
	// 	            $field = $row['field'];          //getting field name
	// 	            $error = form_error($field);    //getting error for field name
	// 	                                            //form_error() is inbuilt function
	// 	            //if error is their for field then only add in $errors_array array
	// 	            if($error){
	//                     $status['error_message'] = strip_tags($error);
	//                     break;
	// 	            }
	//         	}
 //    		}
 //    		else
 //    		{
	// 			$data = array(
	// 			'user_reg_by' => "admin",
	// 			'first_name' => $this->input->post('first_name'),
	// 			'user_mobile' => $this->input->post('user_mobile'),
	// 			'user_email' => $this->input->post('user_email'),
	// 			'user_password' => random_password(),				
	// 			'user_dob' => $this->input->post('user_dob'),
	// 			'user_package' => $this->input->post('user_package'),
	// 			'user_status' => 1,
	// 			'user_createddate' => date('Y-m-d'),
	// 			);

	// 			$result = $this->usersmodel->add_primary_users($data);
	// 			//exit();	
	// 			if($result)
	// 			{

	// 				 $data['result']=$result;
	// 				  $message = $this->load->view('admin/register_confirmation',$data,TRUE);     
        
                         
	// 					$this->config->load('email', true);
	// 					$emailsetup = $this->config->item('email');
	// 					$this->load->library('email', $emailsetup);
	// 					$to_email = $data['user_email'];
	// 					$subject = 'Registration';
	// 					$this->email->initialize($emailsetup); 
	// 					$this->email->from($emailsetup['username'], 'Oozaaoo Club');
	// 					$this->email->to($to_email);
	// 					$this->email->subject($subject);
	// 					$this->email->message($message);

	// 					if($this->email->send())
	// 					{
	// 						$this->load->view('pages/sendsms');
	// 						$sendsms = new Sendsms("http://alerts.maxwellsms.com/api", "A5e24450f7e3297df048b257204e76d89", "SaaiRG");
	// 						$text="Successfully registered with Oozaaoo Club.Please use the login details username:".$result." Password:".$data['user_password'];
	// 						$sendsms->send_sms($data['user_mobile'], $text,'json');
	// 						$this->form_validation->clear_field_data();
	// 						$status['error_message'] = "Leader Added Successfully!";							
	// 					}

	// 			}
	// 			else
	// 			{
	// 				$status['error_message'] = "Can not Add User Below";	
	// 			}
 //    		}
	// 	}

	// 	$this->load->view('admin/add_primary_users',$status);	
	// }

	public function add_primary_users()
    {                
         $data = array();
        // $data['title'] = ucfirst($page); // Capitalize the first letter
        if(!empty($_POST))
        {

          if($this->input->post('contact')==1)
          {
                  $fields = array(
                  'first_name' => $this->input->post('name'),
                  'user_mobile' => $this->input->post('mobile'),
                  'user_email' => $this->input->post('email'),           
                  'message' => $this->input->post('message'),
                  );
                  $message = $this->load->view('admin/templates/contact',$fields,TRUE);     
                  
                  $this->config->load('email', true);
                  $emailsetup = $this->config->item('email');
                  $this->load->library('email', $emailsetup);
                  $this->email->initialize($emailsetup); 
                  $this->email->from($this->input->post('contact'));
                  $this->email->to($emailsetup['smtp_user']);
                  $this->email->subject('Contact Form');
                  $this->email->message($message);
                  if($this->email->send())
                  {                      
                     echo "yes";
                  }
          }       
          else
          {
            $user=$this->session->userdata['logged_in']['userid'];
            $user_email=$this->session->userdata['logged_in']['email'];
            
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
              /*******************OTP*******************/
              

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
                     // 'rules'   => 'trim|required'
                  //    //image
                  ),
                          array(
                     'field'   => 'payment',
                     'label'   => 'Payment',
                     'rules'   => 'trim|required'
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
                        $data['error_message'] = strip_tags($error);
                        break;
                    }
                }
            }
            else
            {
              $this->load->view('pages/otp');
              $sendotp = new Otp();
               $resOTP = $sendotp->generate_numeric_otp();
               
               //Store image
               $this->load->library('upload');
               // print_r($_FILES['image']);
               if(!empty($_FILES['image']['name'])){
                  $imagename = $_FILES["image"]['name'];
                  $config['upload_path'] = FCPATH.USER_PROFILE_PATH; 
                  $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
                  $personnal_logo['file_ext_tolower']   = TRUE;
                  $config['max_size']    = '20480'; // Maximum size - 1MB
                  $config['max_width']  = '10240'; // Maximumm width - 1024px
                  $config['max_height']  = '76800'; // Maximum height - 768px 
                  $config['file_name'] = $imagename;                    
                  $this->upload->initialize($config); // Initialize the configuration   
                  if($this->upload->do_upload('image')){
                    $upload_data = $this->upload->data();                     
                    // $targetfile_details = $upload_data['file_name'];
                    $targetfile_details = preg_replace('/^new_/', '',$upload_data['file_name']);  
                  }
                }
                $fields = array(
                'user_reg_by' => "admin",
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address_line1' => $this->input->post('address_line1'),
                'address_line2' => $this->input->post('address_line2'),
                'city' => $this->input->post('city'),
                'postal_code' => $this->input->post('postal_code'),
                'aadhar_number' => $this->input->post('aadhar_number'),
                'gender' => $this->input->post('gender'),
                'user_mobile' => $this->input->post('user_mobile'),
                'user_email' => $this->input->post('user_email'),
                 'id_proof' => $this->input->post('id_proof'),
                 'package' => $this->input->post('package'),
                 'mode_of_transport' => $this->input->post('mode_of_transport'),
                 
                 'payment' => $this->input->post('payment'),
                'user_password' => random_password(), 
                 'otp' => $resOTP,
                //'otp'=> generateNumericOtp(),         
                'user_dob' => $this->input->post('user_dob'),
              
                'user_status' => 0,
                 'level' => 0,
                'user_createddate' => date('Y-m-d'),
                'image' => isset($targetfile_details) ? $targetfile_details : "",
                'nominee_addr_line1' => $this->input->post('nominee_address_line1'),
                'nominee_addr_line2 ' => $this->input->post('nominee_address_line2'),
                'nominee_city' => $this->input->post('nominee_city'),
                'nominee_state' => $this->input->post('nominee_state'),
                'nominee_postalcode' => $this->input->post('nominee_postal_code'),
                'nominee_country' => $this->input->post('nominee_country'),
                );


                $result = $this->usersmodel->add_primary_users($fields);
                if($result)
                {
                          $fields['result']=$result;
                          $message = $this->load->view('admin/register_confirmation',$fields,TRUE);     
                          $this->config->load('email', true);
                          $emailsetup = $this->config->item('email');
                          $this->load->library('email', $emailsetup);
                          $to_email = $fields['user_email'];
                          $subject = 'Registration';
                          $this->email->initialize($emailsetup); 
                          $this->email->from($emailsetup['smtp_user'], 'Oozaaoo Club');
                          $this->email->to($to_email);
                          $this->email->subject($subject);
                          $this->email->message($message);
                        //echo $this->email->print_debugger();
                         // $this->email->display_message($data['display_message']);
                        if($this->email->send())
                        {
                            $message = $this->load->view('admin/register_admin_confirmation',$fields,TRUE); 
                            $this->email->from($emailsetup['smtp_user'], 'Oozaaoo Club');
                            $this->email->to($emailsetup['smtp_user']);
                            $this->email->subject($subject);
                            $this->email->message($message);
                            if($this->email->send())
                            {
                                // $this->load->view('pages/sendsms');
                                // $sendsms = new Sendsms("http://alerts.maxwellsms.com/api", "A5e24450f7e3297df048b257204e76d89", "SaaiRG");
                                // $text="Successfully registered with Oozaaoo Club.Please use the login details username:".$result." Password:".$fields['user_password']." OTP:".$resOTP;
                                // $sendsms->send_sms($fields['user_mobile'], $text,'json');
                                $this->form_validation->clear_field_data();
                                $data['error_message'] = "User Added Successfully!";      
                            }
                        }
                        
                }
                else
                {
                    $data['error_message'] = "Can not Add User Below"; 
                }
                
            }
        }
      }
    	$this->load->view('admin/add_primary_users',$data);	
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

