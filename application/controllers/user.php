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
        {
            redirect('contact');
        }
            
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
            
            $result = $this->User_model->check_login($username, $password);
            
            if(! $result->user_id)
            {
                $this->session->set_flashdata('login_error', TRUE);
                redirect('user/login'); 
            }
            else
            {
                $this->session->set_userdata(array('logged_in' => TRUE, 'user_id' => $result->user_id, 'type' => $result->type));
                redirect('user/main_page');
            }
		}
	}
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('user/login');
    }
    
    function add_new_user()
    {
        if(!$this->session->userdata('logged_in'))
            redirect('user/login');
        if($this->session->userdata['type'] != 1)
        {
            redirect('user');
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('view_add_user');
            }
            else
            {
                extract($this->input->post());
                echo $username.'<br/>'.$password;
                $result = $this->User_model->add_user($username, $password);
                if($result <= 0)
                {
                    $this->session->set_flashdata('add_error', TRUE);
                    redirect('user/add_new_user'); 
                }
            }    
        }    
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */