<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
    }

    /**
     *
     */
	public function index()
	{
        $data['records'] = $this->ProductsModel->get_all();

        print_r($data['records']);
        $this->load->templateAdmin('admin/products/list',array());
	}
}
