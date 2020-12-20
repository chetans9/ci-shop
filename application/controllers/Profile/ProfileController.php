<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			$this->session->set_userdata('redirect_to',base_url('index.php/'.uri_string()));
			redirect(base_url('index.php/user-login'));
		}
    }

    /**
     * Display user Profile page
     */
    public function index()
    {
        $this->load->model('UsersModel');
        $auth_user = $this->session->userdata("user");
        $user = $this->UsersModel->get($auth_user->id);

        $data['user'] = $user;
        $this->load->template('profile/profile',$data);
    }

    /**
     * Display user's orders page
     */
    public function myOrders()
    {
        $this->load->model('OrdersModel');
        $this->load->model('OrderProductModel');
        $user = $this->session->userdata('user');

        //Get user's orders
        $orders = $this->OrdersModel->getUserOrders($user->id);

        $data['orders'] = $orders;
        $order_ids = $this->OrdersModel->getUserOrderIds($user->id);
        $data['order_products'] = $this->OrderProductModel->getProductsByOrderIds($order_ids);
        $data['user'] = "";
        $this->load->template('profile/my-orders',$data);
    }

    /**
     * Show My wishlist table
     */
    public function myWishList()
    {
        $data = array();
        $user = $this->session->userdata('user');
        $this->load->model('UserWishListModel');

        $data["user_wishlist"] = $this->UserWishListModel->getUserWishList($user->id);

        //print_r(json_encode($data["user_wishlist"]));exit();

        $this->load->template('profile/my-wishlist',$data);
    }
}
