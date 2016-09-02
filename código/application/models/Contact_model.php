<?php

class Contact_model extends CI_Model {
    
    public function add_contact(){
        $data = array (
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message')
        );
        
        $this->db->insert('contacts',$data);           
    }
    
    public function show(){
        $sql = "SELECT * FROM contacts";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}