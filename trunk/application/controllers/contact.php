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
        
        $result = $this->Contact_model->get_contact_list();
        //print_r($result);
        foreach ($result as $row)
        {
            echo '<a href = "'.site_url() . 'contact/user?id='.$row->contact_id.'">'.$row->name.'<br/>'.'</a>';
        }
	}
    
    function user()
    {
        if ($_GET['id'])
        {
            $data['contact'] = $this->Contact_model->get_contact($_GET['id']);
            $this->load->view('view_contact_list', $data);    
        }
        else
        {
            redirect('contact');
        }
        
    }
        
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */