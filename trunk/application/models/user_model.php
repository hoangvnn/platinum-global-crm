<?php  
    class User_model extends CI_Model{
        
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
        
    }    
?>
