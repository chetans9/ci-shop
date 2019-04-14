<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('CategoriesModel');


    }

    /**
     * Display the list of resource.
     *
     *
     */
	public function index()
	{
		$data['categories'] = $this->CategoriesModel->get_all();
		$this->load->template('home',$data);
	}


}
