<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class User_model extends CI_Model{

    // Log in
    public function login($username, $password){
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    // Validate the username
    public function validate_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Validate the email
    public function validate_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Insert user data
    public function insert_user($new_user) {
        $this->db->insert('users', $new_user);
    }

    // Get user info by username
    public function get_info($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $row = $query->row();
        return $row;
    }

    // Update user
    public function update_user($user) {
        $this->db->where('id', $user['id']);
        $this->db->update('users', $user);
    }

    // Get user balance 
    public function get_balance($u_id) {
        $this->db->where('user_id', $u_id);
        $query = $this->db->get('payments');
        if($query->num_rows() > 0) {
            $rows = $query->result();
            $balance = 0;
            foreach ($rows as $row) {
                $balance += $row->payment_gross;
            }
            return $balance;
        } else {
            return 0;
        }
    
    }

    public function reset_pwd($id, $pwd) {
        $reset = array('password' => $pwd);    
        $this->db->where('id', $id);
        $this->db->update('users', $reset); 
    }
}
?>
