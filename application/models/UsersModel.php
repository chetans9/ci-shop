<?php

class UsersModel extends MY_Model {

    public $_table = 'users';

    public function attemptLogin($email,$password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.email',$email);
        $this->db->where('users.password',$password);
        $query = $this->db->get();
        $result = $query->row();

        return $result;

    }

}