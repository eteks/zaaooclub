<?php
class Pages extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usersmodel');
        // Load form helper library
        $this->load->helper('url');
         $this->load->library('email');     
         $this->load->library('session');
        // Load form validation library
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kolkata');
    }
    public function common($page = 'home')
    {
    	if(! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }	        
        
         $data = array();
        $data['title'] = ucfirst($page); // Capitalize the first letter
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
                  $message = $this->load->view('templates/contact',$fields,TRUE);     
                  
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
            $user=$this->session->userdata['log_in']['sess_id'];
            $user_email=$this->session->userdata['log_in']['sess_mail_id'];
            
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
               //assign level for user
               $level_id = $this->session->userdata['log_in']['sess_level'];
               $new_level_id = 0;
               if($level_id >=0){
                $new_level_id = $level_id+1;
               }
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
                'user_reg_by' => $user,
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
                 'south_transport' => $this->input->post('south_transport'),
                 
                 'payment' => $this->input->post('payment'),
                'user_password' => random_password(), 
                 'otp' => $resOTP,
                //'otp'=> generateNumericOtp(),         
                'user_dob' => $this->input->post('user_dob'),
              
                'user_status' => 0,
                 'level' => $new_level_id,
                'user_createddate' => date('Y-m-d'),
                'image' => isset($targetfile_details) ? $targetfile_details : ""
                );


                $result = $this->usersmodel->add_end_users($fields);
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
                         //$this->email->display_message($data['display_message']);
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
        if($page=="saai")
        {
          $user=$this->session->userdata['log_in']['sess_id'];
          $data['reg_user'] = $this->usersmodel->get_users($user);
          //print_r($result);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
   
}
