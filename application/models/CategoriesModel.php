<?php

class CategoriesModel extends MY_Model {

    public $_table = 'categories';

    public function getCategoriesDropdown($id = null)
    {
        if($id)
        {
            $this->db->where('id!=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result_array();
    }



}
