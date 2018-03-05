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
	    $this->load->model('ProductsModel');
	    $data["products_count"] =
		$this->load->templateAdmin('admin/dashboard',array());
	}
}
