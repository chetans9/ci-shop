<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
    }

    /**
     * Display the list of Products.
     *
     *
     */
	public function addToCart()
	{
	    $product_id = $this->input->post('id');
	    $product = $this->ProductsModel->get($product_id);
        $qty = 1;
	    if($this->input->post('qty'))
	    {
            $qty = $this->input->post('qty');
        }



        $data = array(
            'id'      => $product->id,
            'qty'     => $qty,
            'price'   => $product->price,
            'name'    => $product->name,
            'options' => array()
        );

        $status = $this->cart->insert($data);
        if($status)
        {
            $this->session->set_flashdata('success', 'Product added to cart successfully');
        }


        redirect($_SERVER['HTTP_REFERER']);
        exit;

	}


	public function updateCart()
    {
        $input_cart = $product_id = $this->input->post('cart');



        $status = $this->cart->update($input_cart);

        if($status)
        {
            $this->session->set_flashdata('success', 'Cart updated successfully');
        }



        redirect($_SERVER['HTTP_REFERER']);
        exit;
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
    public function show()
    {

        $data['cart'] = $this->cart->contents();

        $this->load->template('cart/cart',$data);
    }
}
