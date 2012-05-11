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
                return $false;
        }
        function get_contact_list()
        {
            $query_str = 'SELECT name, contact_id from contacts limit 20';
            $query = $this->db->query($query_str);
            if ($query->num_rows() >= 1)
                return $query->result();
            else
                return $false;    
        }
        
    }    
?>
