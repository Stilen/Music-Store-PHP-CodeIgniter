<?php

class Deliveries_model extends CI_Model {
    
    public function add_delivery($data,$total){
        $d = array (
            'email' => $data['email'],
            'address' => $data['address'],
            'cart' => $data['cart'],
            'total' => $total
        );
        
        if ($this->db->insert('deliveries',$d)){
            return 1;
        } else{
            return 0;
        }
    }
    
    public function show_deliveries(){
        $sql = "SELECT * FROM deliveries";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}