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
	
    function main_page($from)
    {
        if($this->session->userdata('logged_in'))
        {  
            if($from == 'admin')
                redirect('user/admin_function');
            else
            {
                redirect('contact');    
            }
                
        }
            
        else
            redirect('user/login');
    }
    
	function login($from = 'normal')
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');

		if($this->session->userdata('logged_in'))
        {
            redirect('user/main_page/'.$from);
        }
        
        $data['from'] = $from;    
        
        if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('view_login_iphone', $data);
		}	
		else
		{
            extract($this->input->post());
			
            echo $username.'<br/>'.$password;
            
            $result = $this->User_model->check_login($username, $password);
            
            if(! $result->user_id)
            {
                $this->session->set_flashdata('login_error', TRUE);
                redirect('user/login/'.$from); 
            }
            else
            {
                $this->session->set_userdata(array('logged_in' => TRUE, 'user_id' => $result->user_id, 'type' => $result->type, 'agent' => $this->check_user_agent()));
                redirect('user/main_page/'.$from);
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
        {
            redirect('user/login');
            
        }
            
        if($this->session->userdata['type'] != 1)
        {
            redirect('user');
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password_retype', 'Retype password', 'required|matches[password]|trim|min_length[5]|max_length[50]|xss_clean');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('view_add_user_iphone');
            }
            else
            {
                extract($this->input->post());
                $result = $this->User_model->add_user($username, sha1($password), $type);
                if($result <= 0)
                {
                    $this->session->set_flashdata('add_error', TRUE);
                    redirect('user/add_new_user'); 
                }
                else
                {
                    $this->session->set_flashdata('add_ok', TRUE);
                    redirect('user/add_new_user');
                }
            }    
        }    
    }
    
    function admin_function()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect('user/login/admin');
            
        }   
        
        $this->load->view('view_admin_iphone'); 
    }
    
    function changing_password()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect('user/login');
            
        }   
            $this->form_validation->set_rules('old_pass', 'Old password', 'required|trim|max_length[50]|xss_clean');
            $this->form_validation->set_rules('new_pass', 'New password', 'required|trim|min_length[5]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('retype_pass', 'Retype password', 'required|matches[new_pass]|trim|min_length[5]|max_length[50]|xss_clean');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('view_change_password_iphone');
            }
            else
            {
                extract($this->input->post());
                
                echo $this->session->userdata['user_id'];
                
                $result = $this->User_model->check_password($this->session->userdata['user_id'], sha1($old_pass), sha1($new_pass));
                if($result <= 0)
                {
                    $this->session->set_flashdata('add_error', TRUE);
                    redirect('user/changing_password'); 
                }
                else
                {
                    $this->session->set_flashdata('add_ok', TRUE);
                    redirect('user/changing_password');
                }
            }
        
        $this->load->view('view_change_password_iphone'); 
    }
    
    function check_user_agent()
    {
        $this->load->library('user_agent');

        if ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;

        //echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.) 
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */