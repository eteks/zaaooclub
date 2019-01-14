<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/loginmodel');
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index_login()
	{	
		if($this->session->userdata('logged_in'))
			redirect('admin/dashboard');
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'username',
	             'label'   => 'Username',
	             'rules'   => 'trim|required'
	          ),
	       array(
	             'field'   => 'password',
	             'label'   => 'Password',
	             'rules'   => 'trim|required'
	          ),   
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) 
	    {
	    	foreach($validation_rules as $row)
	    	{
	            $field = $row['field'];          //getting field name
	            $error = form_error($field);    //getting error for field name
	                                            //form_error() is inbuilt function
	            //if error is their for field then only add in $errors_array array
	            // echo "error".$error;
	            if($error)
	            {
	                if (strpos($error,"field is required.") !== false)
	                {
	                    $errors = $error; 
	                    break;
	                }
	                else
	                {
	                    $errors[$field] = $error; 
	                }
	            }
        	}
	        if(strpos($errors,"field is required.") !== false)
	        {  
	             $status = array
	             (
	                'error_message' => 'Please fill out all mandatory fields'
	             );
	        }
	         //print_r($errors);	
			$this->load->view('admin/login',$status);
    	}
    	else
    	{
    		if(!empty($_POST))
    		{
    			$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->loginmodel->user_login($data);
				if ($result == TRUE) {
					$username = $this->input->post('username');
					$result = $this->loginmodel->read_user_information($username);
					if ($result != false) {
					$session_data = array(
					'userid' => $result[0]->adminuser_id,
					'username' => $result[0]->adminuser_username,
					'email' => $result[0]->adminuser_email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					// $status = array(
					// 'error_message' => 'Successfully logged'
					// );
					// $this->render('admin');
					// $this->load->view('admin/index');
					redirect('admin/dashboard');
					}
				}
				 else 
				{
					$status = array(
					'error_message' => 'Invalid Username or Password'
					);
					// print_r($status);	
					$this->load->view('admin/login',$status);
				}
			}
    	}
	}
	// Logout from admin page
	public function logout() 
	{
		// Removing session data
		$sess_array = array(
		'username' => '',
		'email' => ''
		);
		// $this->session->unset_userdata('logged_in', $sess_array);
		$this->session->sess_destroy();
		// $status['error_message'] = 'Successfully Logged out';
		// $this->load->view('admin/login',$status);
		redirect('admin');
	}
}