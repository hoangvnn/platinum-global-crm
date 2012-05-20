<?php  
    class User_model extends CI_Model{
        
        function check_login($username, $password)
        {
            $query_str = 'SELECT user_id, type FROM users WHERE username = ? AND password = SHA1(?)';  
            $result = $this->db->query($query_str, array($username, $password));  
            
            if ($result->num_rows() == 1)
            {
               return $result->row(0); 
            }
            else
            {
                return false;    
            }
        }
    
        function add_user($username, $password, $type)
        {
            $check = $this->db->get_where('users', array('username' => $username));
            if ($check->num_rows() == 0)
            {
                $this->db->insert('users', array('username' => $username, 'password' => $password, 'type' => $type));
                return $this->db->insert_id();    
            } 
            else
            {
                echo 'khong co insert duoc';
            }
        }
        
    }    
?>
