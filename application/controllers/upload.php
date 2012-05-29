<?php
  

class Upload extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $this->load->view('view_edit_image_iphone', array('error' => ' ' ));
    }

    function do_upload($id)
    {
        $config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '1000';
        $config['max_width']  = '10000';
        $config['max_height']  = '10000';
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

//            $this->load->view('upload_form', $error);
            print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);
            rename($data['upload_data']['file_path'].$data['upload_data']['file_name'], $data['upload_data']['file_path'].$id.'.png');
            redirect('contact/user/'.$id);
        }
    }
}
?>
