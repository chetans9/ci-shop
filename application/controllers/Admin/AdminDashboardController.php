<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboardController extends CI_Controller {
    /**
     * AdminDashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(base_url('index.php/login'));
            exit;
        }
    }

    /**
     * Show admin dashboard
     */
	public function index()
	{
	    //$data["products_count"] =
        $this->load->model('OrdersModel');
        $this->load->model('ProductsModel');
        $data["new_orders_count"] = $this->OrdersModel->countNew();
        $data["active_products_count"] = $this->ProductsModel->countActive();

		$this->load->templateAdmin('admin/dashboard',$data);
	}
}
