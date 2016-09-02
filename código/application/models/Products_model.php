<?php
    
    class Products_model extends CI_Model{
        function getOne($id){
            $query = $this->db->get_where("products", array("id" =>$id));
            return $query->result();
        }
        function getData(){
            $sql = "SELECT * FROM products";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
        function getDataCat($cat){
            $sql = "SELECT * FROM products WHERE category = '$cat'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
        function getDataId($id){
            $sql = "SELECT * FROM products WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }