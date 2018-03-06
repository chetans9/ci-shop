<?php

class UserWishListModel extends MY_Model {

    public $_table = 'user_wishlist';

    /**
     * Get users wishlist
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserWishList($user_id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->select("products.name as product_name");
        $this->db->select("product_images.path as product_img");
        $this->db->where("$this->_table.user_id",$user_id);
        $this->db->join("products","$this->_table.product_id = products.id");
        $this->db->join("product_images","product_images.product_id = products.id");
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    public function checkWishListAlreadyExist($user_id,$product_id){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("$this->_table.user_id",$user_id);
        $this->db->where("$this->_table.product_id",$product_id);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if($num_rows>=1){
            return true;
        }
        else{
            return false;
        }
    }

}