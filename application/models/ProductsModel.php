<?php

class ProductsModel extends MY_Model {

    public $_table = 'products';

    public function searchProducts()
    {
        $this->db->select('products.*,product_images.id as image_id,product_images.path as path');
        $this->db->from($this->_table);
        $this->db->join('product_images','products.id = product_images.product_id','left');
        $this->db->group_by('products.id');
        $result = $this->db->get()->result();

        // Loop through the products array
        return $result;

    }

}