<?php

class ProductsModel extends MY_Model {

    public $_table = 'products';

    public function getProductsForShop($category,$inputs,$limit,$offset)
    {
        return $this->buildQuery($category,$inputs,$limit,$offset);
    }

    public function getTotalRecordsForPagination($category,$inputs)
    {
        return count($this->buildQuery($category,$inputs));
    }


    public function buildQuery($category,$inputs,$limit=null,$offset = 0){
    	
        $this->db->select('products.*');

        $this->db->from($this->_table);
        if($category)
        {
            $this->db->where('category_id',$category);
        }

        if(isset($inputs['min_price']) && $inputs['min_price'])
        {
            $this->db->where('products.price >=',$inputs['min_price']);

        }

        if(isset($inputs['max_price']) && $inputs['max_price'])
        {
            $this->db->where('products.price <=',$inputs['max_price']);

        }

        if(isset($inputs['search_str'])  && $inputs['search_str']){
            $this->db->where('products.name LIKE',"%$inputs[search_str]%");
        }

        if(isset($inputs['sort_type']) && $inputs['sort_type'])
        {
            $this->db->order_by('products.price',$inputs['sort_type']);
        }

        $this->db->where('products.status',1);
        $this->db->join('product_images','products.id = product_images.product_id','left');
        $this->db->group_by('products.id');


            //echo ($limit); exit();
        if($limit){
            $this->db->limit($limit,$offset);
        }

        return $this->db->get()->result();
    }

    /**
     * @return mixed
     */
    public function countActive(){
        $this->db->select("$this->_table.id");
        $this->db->from($this->_table);
        $this->db->where("status","0");
        $query = $this->db->get();

        return $query->num_rows();

    }

}
