<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
    }

    /**
     * Show single product page.
     * @param $id
     */
    public function show($id)
    {
        $data['product'] = $this->ProductsModel->get($id);
        $data['product_images'] = $this->ProductImagesModel->getByProductId($id);
        $this->load->template('product/product_detail',$data);
    }


}
