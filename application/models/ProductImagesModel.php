<?php

class ProductImagesModel extends MY_Model {

    public $table = 'product_images';

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

	public function getImagesForProducts($products)
	{
		$result = array();
		if(empty($products)){
			return $result;
		}

		foreach ($products as $product){
			$product_ids[] = $product->id;
		}
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where_in('product_id',$product_ids);
		$result = $this->db->get()->result();

		return $result;
	}

}
