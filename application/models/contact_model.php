<?php  
    class Contact_model extends CI_Model{
        
        function check_login($username, $password)
        {
            $sha1_password = $password;
            $query_str = 'SELECT user_id FROM users WHERE username = ? AND password = ?';  
            $result = $this->db->query($query_str, array($username, $sha1_password));  
            
            if ($result->num_rows() == 1)
            {
               return $result->row(0)->user_id; 
            }
            else
            {
                return false;    
            }
        }
        
        function get_contact($id)
        {
            $query_str = 'SELECT contacts.*, users.username FROM contacts, users WHERE contact_id = ? AND contacts.belong_to = users.user_id';
            $query = $this->db->query($query_str, array($id));
            if ($query->num_rows() == 1)
                return $query->row(0);
            else
                return false;
        }
        function get_contact_list()
        {
            $query_str = 'SELECT name, contact_id from contacts';
            $query = $this->db->query($query_str);
            if ($query->num_rows() >= 1)
                return $query->result();
            else
                return false;    
        }
        
        function search_contact($search)
        {
            $query_str = 'SELECT name, contact_id from contacts where name like '.'\'%'.$this->db->escape_like_str($search).'%\'';
            $result = $this->db->query($query_str, array($search));  
            
            if ($result->num_rows() >= 1)
            {
                return $result->result(); 
            }
            else
            {
                return false;    
            }
                
        }
        
        function show_personal_info($id)
        {
            $check = $this->db->get_where('personal_info', array('contact_id' => $id));
            if ($check->num_rows() >= 1)
            {
                return $check->result();    
            } 
        }

        function show_company_info($id)
        {
            $check = $this->db->get_where('company_info', array('contact_id' => $id));
            if ($check->num_rows() >= 1)
            {
                return $check->result();    
            } 
        }
        
        function add_contact($name, $company, $position, $office_address, $cellphone, $email)
        {
            $this->db->insert('contacts', array('name' => $name, 'company' => $company, 'position' => $position, 'business_address' => $office_address, 'cell_phone' => $cellphone, 'email' => $email, 'belong_to' => $this->session->userdata['user_id']));
            $id = $this->db->insert_id(); 
            $str = $this->db->update_string('contacts', array('picture' => $this->db->insert_id().'.png'), 'contact_id = '.$id); 
            $this->db->query($str);
            return $id;
        }
        
        function update_contact($id, $name, $company, $position, $office_address, $cellphone, $email)
        { 
            $str = $this->db->update_string('contacts', array('name' => $name, 'company' => $company, 'position' => $position, 'business_address' => $office_address, 'cell_phone' => $cellphone, 'email' => $email), 'contact_id = '.$id); 
            $this->db->query($str);
            return $this->db->affected_rows();
        }
        
    }    
?>
