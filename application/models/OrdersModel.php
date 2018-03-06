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
        $this->db->where("order_status","1");
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function getUserOrders($user_id){
        $this->db->select("*");
        $this->db->from($this->_table);
        $this->db->where("user_id",$user_id);

        $query = $this->db->get();

        //$return = $query->result();
        return $query->result();


    }

    public function getUserOrderIds($user_id)
    {
        $this->db->select("id");
        $this->db->from($this->_table);
        $this->db->where("user_id",$user_id);
        $query = $this->db->get();
        $results = $query->result();

        $order_ids = array();
        foreach ($results as $row){
            $order_ids[] =  $row->id;
        }

        //$return = $query->result();
        return $order_ids;

    }
}