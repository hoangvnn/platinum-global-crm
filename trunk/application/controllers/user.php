<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
	public function index()
	{
        $this->login();
	}
	
    function main_page()
    {
        if($this->session->userdata('logged_in'))
            echo 'You have logged in successfully';
        else
            redirect('user/login');
    }
    
	function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');

		if($this->session->userdata('logged_in'))
        {
            redirect('user/main_page');
        }
            
        
        if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('view_login');
		}	
		else
		{
            extract($this->input->post());
			
            echo $username.'<br/>'.$password;
            
            $user_id = $this->User_model->check_login($username, $password);
            
            if(! $user_id)
            {
                $this->session->set_flashdata('login_error', TRUE);
                redirect('user/login'); 
            }
            else
            {
                $this->session->set_userdata(array('logged_in' => TRUE, 'user_id' => $user_id));
                redirect('user/main_page');
            }
		}
	}
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('user/login');
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */