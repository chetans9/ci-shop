<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        if(!$this->session->userdata('logged_in'))
        {
            $this->session->set_userdata('redirect_to',base_url('index.php/'.uri_string()));
            redirect(base_url('index.php/user-login'));
        }
    }
    /**
     * Display the list of resource.
     */
    public function index()
    {
        //if cart is empty,
        if(count($this->cart->contents()) == 0){
            $this->session->set_flashdata('error', 'Please add items  to cart first');
            redirect(base_url('index.php/shop'));
            exit();
        }
        $data['cart'] = $this->cart->contents();

        $this->load->template('checkout/checkout',$data);
    }

    /**
     * Place order
     */
    public function placeOrder()
    {
        $this->load->model('OrdersModel');
        $this->load->model('OrderProductModel');

        $cart_contents = $this->cart->contents();

        $total_amt = $this->cart->total(); //Temperory set to cart total


        $order_data = array(
            'user_id' => $this->session->userdata('user')->id,//Logged in user id
            'delivery_address' => $this->input->post('delivery_address'),
            'pincode'=>$this->input->post('pincode'),
            'order_status' => '1',
            'total_amt'=> $total_amt
        );
        $order_id = $this->OrdersModel->insert($order_data);



        foreach ($cart_contents as $product){
            $order_product_data = array(
                'product_id' => $product['id'],
                'order_id'=>$order_id,
                'qty'=>$product['qty'],
            );
            $this->OrderProductModel->insert($order_product_data);
        }
        if($order_id){
            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Order placed successfully');
            redirect(base_url('index.php/shop'));
            exit;
        }
        else{
            $this->session->set_flashdata('error', 'Oops! Something went wrong.');
            redirect(base_url('index.php/shop'));
            exit;
        }



    }
}
