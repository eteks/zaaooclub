<?php
class Logout extends CI_Controller
{
	public function deset()
	{
		$this->load->library('session');
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) 
        {
           if ($key != 'mail_id' && $key != 'password') 
            {
                $this->session->unset_userdata($key);
            }
        }
		$this->session->sess_destroy();
		ob_clean();
		$url=$_GET['url'];
		redirect('home');  
		//redirect('default_controller');
		//$this->session->unset_userdata('logged_in');
		//$this->session->sess_destroy();
		//$this->load->helper('url');
		//echo $url=$_GET['url'];
		//$redir=base_url()."index.php/".$url;		
	}
}