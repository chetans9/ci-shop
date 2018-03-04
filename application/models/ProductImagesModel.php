<?php

class ProductImagesModel extends MY_Model {

    public $_table = 'product_images';

    /**
     *
     * @param $product_id
     * @return mixed
     */
    public function getByProductId($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_images');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get();
        return $query->result();

    }

    public function getFirstImageByProductId($product_id)
    {
        $this->db->select('*');

        $this->db->from($this->_table);

        $this->db->where('product_id',$product_id);
        $result = $this->db->where('product_id',$product_id)->get();

        return $result->row();
    }

}