<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {


	
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
        if(!$this->session->userdata('logged_in'))
            redirect('user/login');
        
        $data['list'] = $this->Contact_model->get_contact_list();
        
        //foreach ($result as $row)
//        {
//            echo '<a href = "'.site_url() . 'contact/user/'.$row->contact_id.'">'.$row->name.'<br/>'.'</a>';
//        }
        $this->load->view('view_contacts_list_iphone', $data);
        
	}
    
    function user($id)
    {       
        if(!$this->session->userdata('logged_in'))
            redirect('user/login');

        if ($id)
        {
            $data['contact'] = $this->Contact_model->get_contact($id);
            $this->load->view('view_contact_iphone', $data);    
        }
        else
        {
            redirect('contact');
        }
        
    }
    
    function add_contact()
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
            echo 'add contact here';
        }
    }
    
    function edit_contact($id)
    {
        if ($id == '' || $id == 0)
        {
            redirect('contact');
        }
        
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
            $data['contact'] = $this->Contact_model->get_contact($id);
            $this->load->view('view_edit_contact_iphone', $data);
        }
    }
    
    function edit_image($id)
    {
        if ($id == '' || $id == 0)
        {
            redirect('contact');
        }
        
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
            $data['contact'] = $this->Contact_model->get_contact($id);
            $this->load->view('view_edit_image_iphone', $data);
        }
        
    }     
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */