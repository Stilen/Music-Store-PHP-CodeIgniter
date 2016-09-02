<?php

class Users_model extends CI_Model {
    
    public function can_log_in(){
    
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    
    public function admin_can_log_in(){
    
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        
        $query = $this->db->get('admins');
        
        if($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    
    public function add_user(){
        $data = array (
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'password' => md5($this->input->post('password'))
        );
        
        $this->db->insert('users',$data);            
    }
    
    function get_user($email){
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
}