<?php
//session_start();
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }

	public function process()
    { 
    	$data = $this->input->post();
    	//print_r($data);
    	//$this->load->model('login_process');
    	$this->load->model('login_process');
    	$db_data = $this->login_process->check($data);   
        // print_r($db_data);
    	if($db_data != false)
    	{
			// $session_data = array(
			// 'sess_mail_id' => $db_data[0]->user_email,
			// 'sess_password' => $db_data[0]->user_password,
   //          'sess_id' => $db_data[0]->user_id,
   //          'sess_otp' => $db_data[0]->otp,
   //          'sess_user_status' => $db_data[0]->user_status,
			// );
            $session_data = array(
            'sess_mail_id' => $db_data['user_email'],
            'sess_password' => $db_data['user_password'],
            'sess_id' => $db_data['user_id'],
            'sess_otp' => $db_data['otp'],
            'sess_user_status' => $db_data['user_status'],
            'sess_level' => $db_data['level']
            );
            
			// print_r($session_data);
			$this->session->set_userdata('log_in',$session_data);
    		echo "yes";
    	}
    	else
    	{
    		echo "Please Check Username and Password";
    	} 	
    }

    public function logout() 
    {
        // Removing session data
        $session_array = array(
        'sess_mail_id' => '',
            'sess_password' => '',
            'sess_id' => '',
        );
        $this->session->unset_userdata('log_in');
        //        
        //$this->session->sess_destroy();
        // $status['error_message'] = 'Successfully Logged out';
        //$this->load->view('pages/home',$status);
        redirect('home');
    }
    
}