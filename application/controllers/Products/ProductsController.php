<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
    }

    /**
     * Display the list of Products.
     *
     *
     */
	public function index()
	{
       $data['products'] = $this->ProductsModel->searchProducts();
       //print_r($data['records']);exit();

       $this->load->template('products/products',$data);
	}

	public function getImagesByProductId($id)
    {
        return $this->ProductsModel->getImagesByProductId($id);

    }


    /**
     * Display the list of resource.
     *
     *
     */
    public function show($id)
    {

        $data['product'] = $this->ProductsModel->get($id);

        $data['product_images'] = $this->ProductImagesModel->getByProductId($id);



        $this->load->template('products/product_detail',$data);
    }
}
