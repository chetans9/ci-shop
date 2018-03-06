<?php

class OrdersModel extends MY_Model {
    public $_table = 'orders';

    public function get($id){
        //$this->select("8")
        $this->db->select("$this->_table.*");
        $this->db->select("users.name as user_name, users.email");
        $this->db->join('users',"users.id = $this->_table.user_id","inner");
        $this->db->from($this->_table);
        $result = $this->db->get()->row();

        return $result;
    }

    public function countNew(){
        $this->db->select("$this->_table.id");
        $this->db->from($this->_table);
        $this->db->where("order_status","new");
        $query = $this->db->get();

        return $query->num_rows();

    }
}