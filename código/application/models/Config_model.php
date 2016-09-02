<?php

class Config_model extends CI_Model {

    public function add_product($filename){
        $data = array (
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'image' => $filename['file_name'],
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description')
        );
        
        $this->db->insert('products',$data);       
    }
    
    public function edit($id){
        $data = array(
               'price' => $this->input->post('price')
            );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }
    
    public function delete($id){
        $this->db->delete('products',array('id' => $id)); 
    }
}